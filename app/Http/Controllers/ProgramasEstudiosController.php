<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Facultad;
use App\Programaestudio;
use Validator;
use Auth;
use DB;

use App\Persona;
use App\Tipouser;
use App\User;


use stdClass;
use Storage;
set_time_limit(600);

class ProgramasEstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        if(accesoUser([1])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="escuela";
            return view('escuela.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');           
        }
    }

    public function index(Request $request)
    {   
     $buscar=$request->busca;

     $programaestudios = DB::table('programaestudios')
     ->join('facultads', 'facultads.id', '=', 'programaestudios.facultad_id')
     ->where('programaestudios.borrado','0')
     ->where(function($query) use ($buscar){
        $query->where('programaestudios.nombre','like','%'.$buscar.'%');
        $query->orWhere('facultads.nombre','like','%'.$buscar.'%');
        })
     ->orderBy('facultads.nombre')
     ->orderBy('programaestudios.nombre')
     ->select('programaestudios.id','programaestudios.nombre','programaestudios.activo','programaestudios.borrado','programaestudios.facultad_id','facultads.nombre as facultad')
     ->paginate(30);

     $facultads=Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();

     return [
        'pagination'=>[
            'total'=> $programaestudios->total(),
            'current_page'=> $programaestudios->currentPage(),
            'per_page'=> $programaestudios->perPage(),
            'last_page'=> $programaestudios->lastPage(),
            'from'=> $programaestudios->firstItem(),
            'to'=> $programaestudios->lastItem(),
        ],
        'programaestudios'=>$programaestudios,
        'facultads'=>$facultads
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
        $activo=$request->activo;
        $facultad_id=$request->facultad_id;



        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:programaestudios,nombre'.',1,borrado');

        $input3  = array('facultad_id' => $facultad_id);
        $reglas3 = array('facultad_id' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre del Programa de Estudio';
            $selector='txtesc';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese otro nombre de programa de Estudio, el nombre ingresado ya se encuentra registrado';
            $selector='txtesc';
        }
        elseif ($validator3->fails()) {
            $result='0';
            $msj='Seleccione una Facultad';
            $selector='cbsFacultad';
        }
       
        else{

            $newProgramaestudio = new Programaestudio();
            $newProgramaestudio->nombre=$nombre;
            $newProgramaestudio->descripcion='';
            $newProgramaestudio->direccion='';
            $newProgramaestudio->telefono='';
            $newProgramaestudio->email='';
            $newProgramaestudio->activo=$activo;
            $newProgramaestudio->borrado='0';
            $newProgramaestudio->facultad_id=$facultad_id;
            $newProgramaestudio->user_id=Auth::user()->id;
            $newProgramaestudio->nivel='2';
            $newProgramaestudio->logourl='';
            $newProgramaestudio->tipo_vista='';
            $newProgramaestudio->nombre_organigrama='';
            $newProgramaestudio->url_organigrama='';

            $newProgramaestudio->save();

            $msj='Nuevo Programa de Estudio registrado con éxito';
        }




       //Areaunasam::create($request->all());

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
        $activo=$request->activo;
        $facultad_id=$request->facultad_id;



        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:programaestudios,nombre,'.$id.',id,borrado,0');
        //$reglas4 = array('codigo' => 'unique:dependencias,cod_sis,'.$id.',id,borrado,0');

        $input3  = array('facultad_id' => $facultad_id);
        $reglas3 = array('facultad_id' => 'required');


        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre del Programa de Estudio';
            $selector='txtescE';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese otro nombre del Programa de Estudio, la nombre ingresado ya se encuentra registrado';
            $selector='txtescE';
        }
        elseif ($validator3->fails()) {
            $result='0';
            $msj='Seleccione una Facultad';
            $selector='cbsFacultadE';
        }
       
        else{

            $editProgramaestudio = Programaestudio::findOrFail($id);
            $editProgramaestudio->nombre=$nombre;
            $editProgramaestudio->activo=$activo;
            $editProgramaestudio->facultad_id=$facultad_id;
            $editProgramaestudio->user_id=Auth::user()->id;

            $editProgramaestudio->save();

            $msj='Programa de Estudio modificado con éxito';
        }




       //Areaunasam::create($request->all());

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = Programaestudio::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='El Programa de Estudio fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='El Programa de Estudio fue Activada exitosamente';
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

       
        $borrar = Programaestudio::findOrFail($id);
        //$task->delete();

        $borrar->borrado='1';

        $borrar->save();

        $msj='Programa de Estudio eliminada exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
