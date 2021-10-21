<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Universidad;

use stdClass;
use DB;
use Storage;
set_time_limit(600);

class UniversidadController extends Controller
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

            $modulo="datosunasam";

            return view('adminportal.datosunasam.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }


    public function index(Request $request)
    {
        //$buscar=$request->busca;

        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

          return [
            'unasam'=>$unasam
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
        $ruc=$request->ruc;
        $nombre=$request->nombre;
        $descripcion=$request->descripcion;
        $direccion=$request->direccion;
        $telefono=$request->telefono;
        $email=$request->email;
        $horario_lu_vier=$request->horario_lu_vier;
        $horario_sabado=$request->horario_sabado;
        $horario_domingo=$request->horario_domingo;

        $tipo=$request->tipo;

        $result='1';
        $msj='';
        $selector='';

        $pasaValidacion = true;

        $nivel=$request->v1;
        $universidad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if(intval($tipo) == 0)
        {
            $input  = array('ruc' => $ruc);
            $reglas = array('ruc' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $ruc == null || strlen(trim($ruc)) != 11)
            {
                $result='0';
                $msj='Debe ingresar correctamente el RUC de la Universidad';
                $selector='txtruc';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 1)
        {
            $input  = array('nombre' => $nombre);
            $reglas = array('nombre' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $nombre == null)
            {
                $result='0';
                $msj='Debe ingresar el nombre de la Universidad';
                $selector='txtnombre';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 2)
        {
            $input  = array('descripcion' => $descripcion);
            $reglas = array('descripcion' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $descripcio == mull)
            {
                $result='0';
                $msj='Debe ingresar la descripción de la Universidad';
                $selector='txtdescripcion';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 3)
        {
            $input  = array('direccion' => $direccion);
            $reglas = array('direccion' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $direccion == null)
            {
                $result='0';
                $msj='Debe ingresar la Dirección de la Universidad';
                $selector='txtdireccion';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 4)
        {
            $input  = array('telefono' => $telefono);
            $reglas = array('telefono' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $telefono == null)
            {
                $result='0';
                $msj='Debe ingresar el Teléfono de contacto de la Universidad';
                $selector='txttelefono';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 5)
        {
            $input  = array('email' => $email);
            $reglas = array('email' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $email == null)
            {
                $result='0';
                $msj='Debe ingresar el Correo Electrónico de contacto de la Universidad';
                $selector='txtemail';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 6)
        {
            $input  = array('horario_lu_vier' => $horario_lu_vier);
            $reglas = array('horario_lu_vier' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() ||$horario_lu_vier == null)
            {
                $result='0';
                $msj='Debe ingresar el horario de Atención de Lunes a Viernes de la Universidad';
                $selector='txthorario_lu_vier';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 7)
        {
            $input  = array('horario_sabado' => $horario_sabado);
            $reglas = array('horario_sabado' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $horario_sabado == null)
            {
                $result='0';
                $msj='Debe ingresar el horario de Atención de Sábados de la Universidad';
                $selector='txthorario_sabado';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 8)
        {
            $input  = array('horario_domingo' => $horario_domingo);
            $reglas = array('horario_domingo' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $horario_domingo == null)
            {
                $result='0';
                $msj='Debe ingresar el horario de Atención de Domingos de la Universidad';
                $selector='txthorario_domingo';
                $pasaValidacion = false;
            }
        }

        if($pasaValidacion){

            $universidadBuscar = Universidad::where('activo','1')->where('borrado','0')->first();

            $universidad = Universidad::find($universidadBuscar->id);

            if(intval($tipo) == 0){
                $universidad->ruc = $ruc;
            }
            elseif(intval($tipo) == 1){
                $universidad->nombre = $nombre;
            }
            elseif(intval($tipo) == 2){
                $universidad->descripcion = $descripcion;
            }
            elseif(intval($tipo) == 3){
                $universidad->direccion = $direccion;
            }
            elseif(intval($tipo) == 4){
                $universidad->telefono = $telefono;
            }
            elseif(intval($tipo) == 5){
                $universidad->email = $email;
            }
            elseif(intval($tipo) == 6){
                $universidad->horario_lu_vier = $horario_lu_vier;
            }
            elseif(intval($tipo) == 7){
                $universidad->horario_sabado = $horario_sabado;
            }
            elseif(intval($tipo) == 8){
                $universidad->horario_domingo = $horario_domingo;
            }

            $universidad->user_id=Auth::user()->id;

            $universidad->save();
        
            $msj='Dato General Modificado con Éxito';

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
