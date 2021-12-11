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
use App\Programaestudio;
use App\Numerosalumno;

use stdClass;
use DB;
use Storage;
set_time_limit(600);

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

class NumerosalumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index01()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 7;
        $submodulo = 66;

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

            $modulo="nummatriculadosprograma";

            return view('paginassineace.nummatriculados.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index02()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 7;
        $submodulo = 67;

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

            $modulo="numegresadosprograma";

            return view('paginassineace.numegresados.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index03()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 7;
        $submodulo = 68;

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

            $modulo="numgraduadosprograma";

            return view('paginassineace.numgraduados.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index04()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 2;
        $modulo = 7;
        $submodulo = 69;

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

            $modulo="numtituladosprograma";

            return view('paginassineace.numtitulados.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $tipo=$request->tipo;

        $queryZero=Numerosalumno::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('anio','like','%'.$buscar.'%');
            //$query->orWhere('descripcion','like','%'.$buscar.'%');
            });
        
        if($facultad_id != null && intval($facultad_id) > 0){
            $queryZero->where('facultad_id',$facultad_id);
        }

        if($programaestudio_id != null && intval($programaestudio_id) > 0){
            $queryZero->where('programaestudio_id',$programaestudio_id);
        }

        /* if($nivel != null){
            $queryZero->where('nivel',$nivel);
        } */

        $registros = $queryZero->where('tipo', $tipo)
        ->orderBy('anio','desc')
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $registros->total(),
                'current_page'=> $registros->currentPage(),
                'per_page'=> $registros->perPage(),
                'last_page'=> $registros->lastPage(),
                'from'=> $registros->firstItem(),
                'to'=> $registros->lastItem(),
            ],
            'registros'=>$registros
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
        $tipo=$request->tipo;
        $cantidad=$request->cantidad;
        $anio=$request->anio;
        $activo = 1;

        $result='1';
        $msj='';
        $selector='';

        $pasaValidacion = true;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if(intval($tipo) == 1)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Matriculados del Programa de Estudio';
                $selector='txtcantidadE';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Matriculados del Programa de Estudio';
                $selector='txtanioE';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 2)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Egresados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Egresados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 3)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Graduados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Graduados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 4)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Titulados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Titulados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        if($pasaValidacion){

            $registrado = Numerosalumno::where('borrado',0)->where('tipo',$tipo)->where('programaestudio_id',$programaestudio_id)->where('anio',$anio)->count();

            if(intval($tipo) == 1 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Matriculados, del año ingresado';
                $selector='txtanio';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 2 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Egresados, del año ingresado';
                $selector='txtanio';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 3 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Graduados, del año ingresado';
                $selector='txtanio';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 4 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Titulados, del año ingresado';
                $selector='txtanio';
                $pasaValidacion = false;
            }

        }



        if($pasaValidacion){

            $numerosAlumnos = new Numerosalumno();
            $numerosAlumnos->tipo=$tipo;
            $numerosAlumnos->cantidad=$cantidad;
            $numerosAlumnos->anio=$anio;
            $numerosAlumnos->programaestudio_id=$programaestudio_id;
            $numerosAlumnos->activo=$activo;
            $numerosAlumnos->borrado='0';
            $numerosAlumnos->user_id=Auth::user()->id;
           

            $numerosAlumnos->save();

            $msj='Nuevo Registro guardado con éxito';

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
        $tipo=$request->tipo;
        $cantidad=$request->cantidad;
        $anio=$request->anio;
        
        $result='1';
        $msj='';
        $selector='';

        $pasaValidacion = true;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if(intval($tipo) == 1)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Matriculados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Matriculados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 2)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Egresados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Egresados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 3)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Graduados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Graduados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 4)
        {
            $input  = array('cantidad' => $cantidad);
            $reglas = array('cantidad' => 'required');

            $input2  = array('anio' => $anio);
            $reglas2 = array('anio' => 'required');

            $validator = Validator::make($input, $reglas);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Cantidad de Titulados del Programa de Estudio';
                $selector='txtcantidad';
                $pasaValidacion = false;
            }

            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el año de los Titulados del Programa de Estudio';
                $selector='txtanio';
                $pasaValidacion = false;
            }
        }

        
        if($pasaValidacion){

            $registrado = Numerosalumno::where('id', '<>',$id)->where('borrado',0)->where('tipo',$tipo)->where('programaestudio_id',$programaestudio_id)->where('anio',$anio)->count();

            if(intval($tipo) == 1 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Matriculados, del año ingresado';
                $selector='txtanioE';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 2 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Egresados, del año ingresado';
                $selector='txtanioE';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 3 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Graduados, del año ingresado';
                $selector='txtanioE';
                $pasaValidacion = false;
            }
            elseif(intval($tipo) == 4 && $registrado > 0)
            {
                $result='0';
                $msj='Ya existe un registro del Número de Titulados, del año ingresado';
                $selector='txtanioE';
                $pasaValidacion = false;
            }

        }



        if($pasaValidacion){

            $numerosAlumnos = Numerosalumno::findOrFail($id);
            $numerosAlumnos->tipo=$tipo;
            $numerosAlumnos->cantidad=$cantidad;
            $numerosAlumnos->anio=$anio;
            $numerosAlumnos->user_id=Auth::user()->id;
           

            $numerosAlumnos->save();

            $msj='Registro modificado con éxito';

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

       
        $borrar = Numerosalumno::findOrFail($id);
        //$task->delete();
        $borrar->delete();
        //$borrar->save();

        $msj='Registro eliminado exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
