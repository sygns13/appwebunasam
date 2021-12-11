<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Historia;
use App\Imagenhistoria;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index0()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 11;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="historiaportal";

            return view('paginasportal.historia.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index1()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 1;
        $modulo = 5;
        $submodulo = 36;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $facultads = [];

            if(accesoUser([1,2])){
                $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $facultad = Facultad::find($dato->facultad_id);

                        if($dato->roles == 1){
                            array_push($facultads, $facultad);
                        }
                        elseif($dato->roles == 0){
                            foreach ($rolModulos as $rolModulo) {
                                if($rolModulo->modulo_id == $modulo && $rolModulo->nivel == $nivel && $rolModulo->facultad_id == $dato->facultad_id){
                                    if($rolModulo->rolessub == 1){
                                        array_push($facultads, $facultad);
                                    }
                                    elseif($rolModulo->rolessub == 0){
                                        foreach ($rolSubModulos as $rolSubModulo) {
                                            if($rolSubModulo->submodulo_id == $submodulo && $rolSubModulo->nivel == $nivel && $rolSubModulo->modulo_id == $modulo && $rolSubModulo->facultad_id == $dato->facultad_id){
                                                array_push($facultads, $facultad);
                                            }
                                        }
                    
                                    }
                                }
                                
                            }
                        }
                    } 
                }
            }

            $modulo="historiafacultad";

            return view('paginasfacultad.historia.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
        }
        else
        {
            return redirect('home');    
        }

    }

    public function index2()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 9;
        $submodulo = 71;

        if(accesoUser([1,2]) || (accesoUser([3,4,5]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $programas = [];
            
            

            if(accesoUser([1,2])){
                $programas = Programaestudio::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $programa = Programaestudio::find($dato->programaestudio_id);

                        if($dato->roles == 1){
                            array_push($programas, $programa);
                        }
                        elseif($dato->roles == 0){
                            foreach ($rolModulos as $rolModulo) {
                                if($rolModulo->modulo_id == $modulo && $rolModulo->nivel == $nivel && $rolModulo->programaestudio_id == $dato->programaestudio_id){
                                    if($rolModulo->rolessub == 1){
                                        array_push($programas, $programa);
                                    }
                                    elseif($rolModulo->rolessub == 0){
                                        foreach ($rolSubModulos as $rolSubModulo) {
                                            if($rolSubModulo->submodulo_id == $submodulo && $rolSubModulo->nivel == $nivel && $rolSubModulo->modulo_id == $modulo && $rolSubModulo->programaestudio_id == $dato->programaestudio_id){
                                                array_push($programas, $programa);
                                            }
                                        }
                    
                                    }
                                }
                                
                            }
                        }
                    } 
                }
            }

            $modulo="historiaprograma";

            return view('paginasprograma.historia.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $queryZero=Historia::where('borrado','0');
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
            $historia = $queryZero->first();

        if($historia != null){
            $imagenhistoria = Imagenhistoria::where('activo','1')->where('borrado','0')->where('historia_id', $historia->id)->get();
            $historia->imagenhistoria = $imagenhistoria;
        }
        

          return [
            'historia'=>$historia
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
        $historia=$request->historia;
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

        $input2  = array('historia' => $historia);
        $reglas2 = array('historia' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails())
        {
            $result='0';
            $msj='Debe ingresar el título de la Historia';
            $selector='txttitulo';
        }
        elseif ($validator2->fails())
        {
            $result='0';
            $msj='Debe ingresar el contenido de la Historia';
            $selector='txthistoria';
        }
        else{

            if($id== null || Strlen($id) == 0){

                $history = new Historia();
                $history->titulo=$titulo;
                $history->historia=$historia;
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
                
                $history = Historia::findOrFail($id);
                $history->titulo=$titulo;
                $history->historia=$historia;
                $history->activo=$activo;
                $history->user_id=Auth::user()->id;

                $history->save();
            }
            

            $msj='Historia Registrada con Éxito';

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
