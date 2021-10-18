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

class HistoriaController extends Controller
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

            $modulo="historiafacultad";

            return view('adminfacultad.historia.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        //$buscar=$request->busca;

        $historia=Historia::where('borrado','0')
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
        ->where('facultad_id',1)
        ->where('nivel',1)
        ->first();

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
                $history->nivel='1';
                $history->user_id=Auth::user()->id;
                $history->facultad_id='1';

                $history->save();
                
            }
            else{
                
                $history = Historia::findOrFail($id);
                $history->titulo=$titulo;
                $history->historia=$historia;
                $history->activo=$activo;
                $history->nivel='1';
                $history->user_id=Auth::user()->id;
                $history->facultad_id='1';

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
