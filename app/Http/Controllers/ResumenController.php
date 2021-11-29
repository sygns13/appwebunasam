<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Resumen;
use App\Imagenresumen;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class ResumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 7;
        $submodulo = 57;

        if(accesoUser([1,2]) || (accesoUser([3,4,5]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $programas = [];
            
            $modulo="resumenprograma";

            if(accesoUser([1,2])){
                $programas = Programaestudio::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $programa = Programaestudio::find($dato->programa_id);
                        array_push($programas, $programa);
                    } 
                }
            }

            return view('paginassineace.resumen.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        //$buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $queryZero=Resumen::where('borrado','0');
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
            if($facultad_id != null && intval($facultad_id) > 0){
                $queryZero->where('facultad_id',$facultad_id);
            }
    
            if($programaestudio_id != null && intval($programaestudio_id) > 0){
                $queryZero->where('programaestudio_id',$programaestudio_id);
            }
    
            if($nivel != null){
                $queryZero->where('nivel',$nivel);
            }
            $resumen = $queryZero->first();

        if($resumen != null){
            $imagenresumen = Imagenresumen::where('activo','1')->where('borrado','0')->where('resumen_id', $resumen->id)->get();
            $resumen->imagenresumen = $imagenresumen;
        }
        

          return [
            'resumen'=>$resumen
            ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

        $id=$request->id;
        $titulo=$request->titulo;
        $resumen=$request->resumen;
        $tieneimagen=$request->tieneimagen;

        $activo=1;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');

        $input2  = array('resumen' => $resumen);
        $reglas2 = array('resumen' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails())
        {
            $result='0';
            $msj='Debe ingresar el título de la Resumen';
            $selector='txttitulo';
        }
        elseif ($validator2->fails())
        {
            $result='0';
            $msj='Debe ingresar el contenido de la Resumen';
            $selector='txtresumen';
        }
        else{

            if($id== null || Strlen($id) == 0){

                $history = new Resumen();
                $history->titulo=$titulo;
                $history->resumen=$resumen;
                $history->activo=$activo;
                $history->borrado='0';
                $history->user_id=Auth::user()->id;
                $history->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $history->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $history->programaestudio_id=$programaestudio_id;
                }

                $history->save();
                
            }
            else{
                
                $history = Resumen::findOrFail($id);
                $history->titulo=$titulo;
                $history->resumen=$resumen;
                $history->activo=$activo;
                $history->user_id=Auth::user()->id;

                $history->save();
            }
            

            $msj='Resumen Registrada con Éxito';

        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}