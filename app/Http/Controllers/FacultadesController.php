<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Facultad;

use stdClass;
use DB;
use Storage;
set_time_limit(600);

class FacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index1()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="facultad";

            return view('facultad.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index(Request $request)
    {   
     $buscar=$request->busca;

     $facultads = DB::table('facultads')
     ->where('facultads.borrado','0')
     ->where(function($query) use ($buscar){
        $query->where('facultads.nombre','like','%'.$buscar.'%');
        //$query->orWhere('locals.nombre','like','%'.$buscar.'%');
        })
     ->orderBy('facultads.nombre')
     ->select('facultads.id','facultads.nombre','facultads.activo','facultads.borrado')
     ->paginate(30);


     return [
        'pagination'=>[
            'total'=> $facultads->total(),
            'current_page'=> $facultads->currentPage(),
            'per_page'=> $facultads->perPage(),
            'last_page'=> $facultads->lastPage(),
            'from'=> $facultads->firstItem(),
            'to'=> $facultads->lastItem(),
        ],
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

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:facultads,nombre'.',1,borrado');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre de la Facultad';
            $selector='txtfac';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese otro nombre de Facultad, la Facultad ingresada ya se encuentra registrada';
            $selector='txtfac';
        }
       
        else{

            $newFacultad = new Facultad();
            $newFacultad->nombre=$nombre;
            $newFacultad->descripcion='';
            $newFacultad->direccion='';
            $newFacultad->telefono='';
            $newFacultad->email='';
            $newFacultad->activo=$activo;
            $newFacultad->borrado='0';
            $newFacultad->user_id=Auth::user()->id;
            $newFacultad->nivel='1';

            $newFacultad->save();

            $msj='Nueva Facultad registrada con éxito';
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

        $result='1';
        $msj='';
        $selector='';

        $input1  = array('nombre' => $nombre);
        $reglas1 = array('nombre' => 'required');

        $input2  = array('nombre' => $nombre);
        $reglas2 = array('nombre' => 'unique:facultads,nombre,'.$id.',id,borrado,0');
        //$reglas4 = array('codigo' => 'unique:dependencias,cod_sis,'.$id.',id,borrado,0');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);


        if ($validator1->fails())
        {
            $result='0';
            $msj='Complete el nombre de la Facultad';
            $selector='txtfacE';

        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese otro nombre de Facultad, la Facultad ingresada ya se encuentra registrada';
            $selector='txtfacE';
        }
       
        else{

            $editFacultad = Facultad::findOrFail($id);
            $editFacultad->nombre=$nombre;
            $editFacultad->activo=$activo;
            $editFacultad->user_id=Auth::user()->id;

            $editFacultad->save();

            $msj='Facultad Modificada con éxito';
        }




       //Areaunasam::create($request->all());

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$activo)
    {
        $result='1';
        $msj='';
        $selector='';

        $update = Facultad::findOrFail($id);
        $update->activo=$activo;
        $update->save();

        if(strval($activo)=="0"){
            $msj='La Facultad fue Desactivada exitosamente';
        }elseif(strval($activo)=="1"){
            $msj='La Facultad fue Activada exitosamente';
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

        $consulta1=DB::table('programaestudios')
                    ->join('facultads', 'programaestudios.facultad_id', '=', 'facultads.id')
                    ->where('programaestudios.borrado','0')
                    ->where('facultads.id',$id)->count();



        if($consulta1>0) {
            $result='0';
            $msj='La Facultad Seleccionada no se puede eliminar debido a que cuenta con registros de Programas de Estudios registrados en ella';
        }else{
        
        $borrar = Facultad::findOrFail($id);
        //$task->delete();

        $borrar->borrado='1';

        $borrar->save();

        $msj='Facultad eliminada exitosamente';
     }

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
