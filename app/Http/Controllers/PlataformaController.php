<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Plataforma;

use stdClass;
use DB;
use Storage;
set_time_limit(600);

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

class PlataformaController extends Controller
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
        $modulo = 1;
        $submodulo = 8;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="plataforma";

            return view('adminportal.plataforma.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index(Request $request)
    {
        $buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $queryZero=Plataforma::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
            $query->orWhere('url','like','%'.$buscar.'%');
            });
        
        if($facultad_id != null && intval($facultad_id) > 0){
            $queryZero->where('facultad_id',$facultad_id);
        }

        if($programaestudio_id != null && intval($programaestudio_id) > 0){
            $queryZero->where('programaestudio_id',$programaestudio_id);
        }

        if($nivel != null){
            $queryZero->where('nivel',$nivel);
        }

        $plataformas = $queryZero
        ->orderBy('id')
        ->paginate(20);

          return [
            'pagination'=>[
                'total'=> $plataformas->total(),
                'current_page'=> $plataformas->currentPage(),
                'per_page'=> $plataformas->perPage(),
                'last_page'=> $plataformas->lastPage(),
                'from'=> $plataformas->firstItem(),
                'to'=> $plataformas->lastItem(),
            ],
            'plataformas'=>$plataformas
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
        $nombre=$request->nombre;
        $url=$request->url;
        $activo=$request->activo;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('url' => $url);
        $reglas2 = array('url' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails())
        {
            $result='0';
            $msj='Debe ingresar el nombre de la plataforma';
            $selector='txtnombre';
        }
        elseif ($validator2->fails())
        {
            $result='0';
            $msj='Debe ingresar la URL de la plataforma';
            $selector='txturl';
        }
        else{
            $plataforma = new Plataforma();
            $plataforma->nombre=$nombre;
            $plataforma->url=$url;
            $plataforma->activo=$activo;
            $plataforma->borrado='0';
            $plataforma->nivel=$nivel;
            if($facultad_id != null && intval($facultad_id) > 0){
                $plataforma->facultad_id=$facultad_id;
            }
            if($programaestudio_id != null && intval($programaestudio_id) > 0){
                $plataforma->programaestudio_id=$programaestudio_id;
            }
            $plataforma->user_id=Auth::user()->id;

            $plataforma->save();

            $msj='Nueva Plataforma Registrada con Éxito';
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
        $nombre=$request->nombre;
        $url=$request->url;
        $activo=$request->activo;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('url' => $url);
        $reglas2 = array('url' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails())
        {
            $result='0';
            $msj='Debe ingresar el nombre de la plataforma';
            $selector='txtnombreE';
        }
        elseif ($validator2->fails())
        {
            $result='0';
            $msj='Debe ingresar la URL de la plataforma';
            $selector='txturlE';
        }
        else{
            $plataforma = Plataforma::findOrFail($id);
            $plataforma->nombre=$nombre;
            $plataforma->url=$url;
            $plataforma->activo=$activo;
            $plataforma->user_id=Auth::user()->id;

            $plataforma->save();

            $msj='La Plataforma ha sido modificada con éxito';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $plataforma = Plataforma::findOrFail($id);
        $plataforma->activo=$estado;
        $plataforma->save();

        if(strval($estado)=="0"){
            $msj='La Plataforma fue Desactivada exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='La Plataforma fue Activada exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result='1';
        $msj='1';



        $plataforma = Plataforma::findOrFail($id);     
        //$task->delete();
        $plataforma->borrado='1';
        $plataforma->user_id=Auth::user()->id;
        $plataforma->save();

        $msj='Plataforma eliminada exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
