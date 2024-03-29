<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Facultad;
use App\Programaestudio;

use stdClass;
use DB;
use Storage;
set_time_limit(600);

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

class ProgramaestudioController extends Controller
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

        $nivel = 2;
        $modulo = 6;
        $submodulo = 48;

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

            $modulo="configuracionprograma";

            return view('adminprograma.configuracion.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $nivel = 2;
        $modulo = 6;
        $submodulo = 51;

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

            $modulo="datosprograma";

            return view('adminprograma.datosprograma.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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
        $submodulo = 72;

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

            $modulo="organigramaprograma";

            return view('paginasprograma.organigrama.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        $programa_id=$request->v1;

        $programa = Programaestudio::find($programa_id);

          return [
            'programa'=>$programa
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
        $descripcion=$request->descripcion;
        $direccion=$request->direccion;
        $telefono=$request->telefono;
        $email=$request->email;

        $tipo=$request->tipo;

        $result='1';
        $msj='';
        $selector='';

        $pasaValidacion = true;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if(intval($tipo) == 1)
        {
            $input  = array('nombre' => $nombre);
            $reglas = array('nombre' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre del Programa de Estudio';
                $selector='txtnombre';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 2)
        {
            $input  = array('descripcion' => $descripcion);
            $reglas = array('descripcion' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción del Programa de Estudio';
                $selector='txtdescripcion';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 3)
        {
            $input  = array('direccion' => $direccion);
            $reglas = array('direccion' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar la Dirección del Programa de Estudio';
                $selector='txtdireccion';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 4)
        {
            $input  = array('telefono' => $telefono);
            $reglas = array('telefono' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar el Teléfono de contacto del Programa de Estudio';
                $selector='txttelefono';
                $pasaValidacion = false;
            }
        }

        elseif(intval($tipo) == 5)
        {
            $input  = array('email' => $email);
            $reglas = array('email' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails())
            {
                $result='0';
                $msj='Debe ingresar el Correo Electrónico de contacto del Programa de Estudio';
                $selector='txtemail';
                $pasaValidacion = false;
            }
        }

        if($pasaValidacion){

            $programa = Programaestudio::find($programaestudio_id);

            if(intval($tipo) == 1){
                $programa->nombre = $nombre;
            }
            elseif(intval($tipo) == 2){
                $programa->descripcion = $descripcion;
            }
            elseif(intval($tipo) == 3){
                $programa->direccion = $direccion;
            }
            elseif(intval($tipo) == 4){
                $programa->telefono = $telefono;
            }
            elseif(intval($tipo) == 5){
                $programa->email = $email;
            }

            $programa->save();
        
            $msj='Dato de Contacto Modificado con Éxito';

        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function configuracion(Request $request)
    {
        $tipo_vista=$request->tipo_vista;

        $result='1';
        $msj='';
        $selector='';

        $pasaValidacion = true;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;


            $input  = array('tipo_vista' => $tipo_vista);
            $reglas = array('tipo_vista' => 'required');

            $validator = Validator::make($input, $reglas);

            if ($validator->fails() || $tipo_vista == null || strlen(trim($tipo_vista)) == 0)
            { 
                $result='0';
                $msj='Debe emitir correctamente los datos del formulario '.$tipo_vista.' '.strlen(trim($tipo_vista)).' '.$validator->errors();
                $selector='cbutipo_vista';
                $pasaValidacion = false;
            }


        if($pasaValidacion){

            $programa = Programaestudio::find($programaestudio_id);

            $programa->tipo_vista = $tipo_vista;

            $programa->user_id=Auth::user()->id;

            $programa->save();
        
            $msj='Configuración de Diseño Modificado con Éxito';

        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function logo(Request $request)
    {
        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

                
        $result='1';
        $msj='';
        $selector='';

        $id=$request->id;        
        $url=$request->url;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $oldImg=$request->oldimg;

        if ($request->hasFile('imagen')) { 

            $aux='logo-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen' => $img) ;
            $reglas = array('imagen' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagen';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagen';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                //$subir=Storage::disk('logoFacultad')->put($nuevoNombre, \File::get($img));

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('logoUNASAM')->put($nuevoNombre, \File::get($img));
                //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('logoFacultad')->put($nuevoNombre, \File::get($img));
                //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                    $subir=Storage::disk('logoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                }


                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir la imagen, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen';
                }
            }
        }
        else{
            $msj="Debe de adjuntar una imagen del válida";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }


        if($segureImg==1){
            

            if(intval($nivel) == 0){
                Storage::disk('logoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('logoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('logoProgramaEstudio')->delete($imagen);
            }


        }
        else{

            if($oldImg != null && Strlen($oldImg) > 0){
                if(intval($nivel) == 0){
                    Storage::disk('logoUNASAM')->delete($oldImg);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('logoFacultad')->delete($oldImg);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('logoProgramaEstudio')->delete($oldImg);
                }
            }

            if($id == null || Strlen($id) == 0){
                $programa = Programaestudio::find($programaestudio_id);
                $programa->logourl = $imagen;
                $programa->user_id=Auth::user()->id;
                $programa->save();
            }
            else{
                $programa = Programaestudio::find($id);
                $programa->logourl = $imagen;
                $programa->user_id=Auth::user()->id;
                $programa->save();
            }

            $msj='Configuración de Logo Modificado con Éxito';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);


    }


    public function organigrama(Request $request)
    {
        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

        
        $nombre_organigrama=$request->nombre_organigrama;
        $url_organigrama=$request->url_organigrama;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $result='1';
        $msj='';
        $selector='';

        $oldFile=$request->oldFile;

        $validarOrganigrama = true;

        $programa = Programaestudio::find($programaestudio_id);

        if($programa != null && $programa->url_organigrama != null && Strlen($programa->url_organigrama) > 0){
            $validarOrganigrama = false;
        }



        if($request->hasFile('archivo')){

            $nombreArchivo=$request->nombrefile;

            $aux2='organigrama_'.date('d-m-Y').'-'.date('H-i-s');
            $input2  = array('archivo' => $file) ;
            $reglas2 = array('archivo' => 'required|file:1,1024000');
            $validatorF = Validator::make($input2, $reglas2);     

            if ($validatorF->fails())
            {
                $segureFile=1;
                $msj="El archivo adjunto ingresado tiene un tamaño superior a 100 MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo';
            }
            else
            {
                $nombre2=$file->getClientOriginalName();
                $extension2=$file->getClientOriginalExtension();
                $nuevoNombre2=$aux2.".".$extension2;
                //$subir2=Storage::disk('infoFile')->put($nuevoNombre2, \File::get($file));

                if($extension2=="pdf" || $extension2=="PDF")
                {

                    $subir2=false;
                    if(intval($nivel) == 0){
                        $subir2=Storage::disk('organigramaUNASAM')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('organigramaUNASAM')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir2=Storage::disk('organigramaFacultad')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('organigramaFacultad')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir2=Storage::disk('organigramaProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                    // $subir2=Storage::disk('organigramaProgramaEstudio')->put($nuevoNombre2, $imgR);
                    }

                if($subir2){
                    $archivo=$nuevoNombre2;

                    if($oldFile != null && Strlen($oldFile) > 0){
                        if(intval($nivel) == 0){
                            Storage::disk('organigramaUNASAM')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('organigramaFacultad')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('organigramaProgramaEstudio')->delete($oldFile);
                        }
                    }
                }
                else{
                    $msj="Error al subir el archivo adjunto, intentelo nuevamente luego";
                    $segureFile=1;
                    $result='0';
                    $selector='archivo';
                }
                }
                else {
                    $segureFile=1;
                    $msj="El archivo adjunto ingresado tiene una extensión no válida, ingrese otro archivo o limpie el formulario";
                    $result='0';
                    $selector='archivo';
                }
            }

        }
        else{

            if( $validarOrganigrama ){
                $msj="Debe de adjuntar un archivo adjunto válido, ingrese un archivo";
                $segureFile=1;
                $result='0';
                $selector='archivo';
            }
        }        

        if($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('organigramaUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('organigramaFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('organigramaProgramaEstudio')->delete($archivo);
            }
        }
        else{

            

            $input2  = array('nombre_organigrama' => $nombre_organigrama);
            $reglas2 = array('nombre_organigrama' => 'required');

            $validator2 = Validator::make($input2, $reglas2);


            if ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el Título del Organigrama';
                $selector='txtnombre_organigrama';
            }

            else{


                    $programa = Programaestudio::find($programaestudio_id);
                    $programa->nombre_organigrama = $nombre_organigrama;

                    if($archivo != null && Strlen($archivo) > 0){
                        $programa->url_organigrama = $archivo;
                    }
                    
                    $programa->user_id=Auth::user()->id;
                    $programa->save();


                $msj='Datos Registrados con Éxito';
            }
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
