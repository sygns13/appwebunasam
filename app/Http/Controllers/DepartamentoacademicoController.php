<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Departamentoacademico;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;



class DepartamentoacademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index1()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 1;
        $modulo = 5;
        $submodulo = 44;

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

            $modulo="departamentoacademico";

            return view('paginasfacultad.departamentoacademico.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
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

        $queryZero=Departamentoacademico::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
            $query->orWhere('director','like','%'.$buscar.'%');
            $query->orWhere('descripcion_corta_director','like','%'.$buscar.'%');
            });

            if($facultad_id != null && intval($facultad_id) > 0){
                $queryZero->where('facultad_id',$facultad_id);
            }
    

        $departamentos = $queryZero->orderBy('facultad_id','desc')
        ->orderBy('nombre','desc')
        ->orderBy('id')
        ->paginate(10);



          return [
            'pagination'=>[
                'total'=> $departamentos->total(),
                'current_page'=> $departamentos->currentPage(),
                'per_page'=> $departamentos->perPage(),
                'last_page'=> $departamentos->lastPage(),
                'from'=> $departamentos->firstItem(),
                'to'=> $departamentos->lastItem(),
            ],
            'departamentos'=>$departamentos
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

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $email = $request->email;
        $tieneimagen = $request->tieneimagen;
        $url = $request->url;
        $director = $request->director;
        $descripcion_director = $request->descripcion_director;
        $descripcion_corta_director = $request->descripcion_corta_director;
        $tieneimagen_director = $request->tieneimagen_director;
        $url_director = $request->url_director;
        $activo=$request->activo;

        
        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $imagen2="";
        $img2=$request->imagen2;
        $segureImg2=0;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if($tieneimagen == 1){
            if ($request->hasFile('imagen')) { 

                $aux='departamento-'.date('d-m-Y').'-'.date('H-i-s');
                $input  = array('imagen' => $img) ;
                $reglas = array('imagen' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                $input2  = array('imagen' => $img) ;
                $reglas2 = array('imagen' => 'required|file:1,102400');
                $validatorF = Validator::make($input2, $reglas2);

                if ($validator->fails())
                {

                $segureImg=1;
                $msj="El archivo ingresado como imagen principal no es una imagen válida, ingrese otro archivo o limpie el formulario ";
                $result='0';
                $selector='imagen';
                }
                elseif($validatorF->fails())
                {

                $segureImg=1;
                $msj="El archivo ingresado como imagen principal tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
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

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('departamentoUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('departamentoFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('departamentoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                    }



                    if($subir){
                        $imagen=$nuevoNombre;
                    }
                    else{
                        $msj="Error al subir la imagen principal, intentelo nuevamente luego";
                        $segureImg=1;
                        $result='0';
                        $selector='imagen';
                    }
                }
            }
            else{
                $msj="Debe de adjuntar una imagen principal válida, ingrese un archivo";
                $segureImg=1;
                $result='0';
                $selector='imagen';
            }
        }

        if($tieneimagen_director == 1){
            if ($request->hasFile('imagen2')) { 

                $aux='jefedepar-'.date('d-m-Y').'-'.date('H-i-s');
                $input  = array('imagen2' => $img2) ;
                $reglas = array('imagen2' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                $input2  = array('imagen2' => $img2) ;
                $reglas2 = array('imagen2' => 'required|file:1,102400');
                $validatorF = Validator::make($input2, $reglas2);

                if ($validator->fails())
                {

                $segureImg2=1;
                $msj="El archivo ingresado como imagen de jefe de departamento académico no es una imagen válida, ingrese otro archivo o limpie el formulario ";
                $result='0';
                $selector='imagen2';
                }
                elseif($validatorF->fails())
                {

                $segureImg2=1;
                $msj="El archivo ingresado como imagen de jefe de departamento académico tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='imagen2';
                }

                else
                {
                    //$nombre=$img2->getClientOriginalName();
                    $extension=$img2->getClientOriginalExtension();
                    $nuevoNombre=$aux.".".$extension;

                    /* $img2R = Image::make($img2);
                    $img2R->resize(1500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream(); */

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('jefedeparUNASAM')->put($nuevoNombre, \File::get($img2));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $img2R);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('jefedeparFacultad')->put($nuevoNombre, \File::get($img2));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $img2R);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('jefedeparProgramaEstudio')->put($nuevoNombre, \File::get($img2));
                    // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $img2R);
                    }



                    if($subir){
                        $imagen2=$nuevoNombre;
                    }
                    else{
                        $msj="Error al subir la imagen de jefe de departamento académico, intentelo nuevamente luego";
                        $segureImg2=1;
                        $result='0';
                        $selector='imagen2';
                    }
                }
            }
            else{
                $msj="Debe de adjuntar una imagen válida de jefe de departamento académico, ingrese un archivo";
                $segureImg2=1;
                $result='0';
                $selector='imagen2';
            }
        }

        if($segureImg==1){

            if(intval($nivel) == 0){
                Storage::disk('departamentoUNASAM')->delete($imagen);
                Storage::disk('jefedeparUNASAM')->delete($imagen2);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('departamentoFacultad')->delete($imagen);
                Storage::disk('jefedeparFacultad')->delete($imagen2);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
            }


        }
        elseif($segureImg2==1){

            if(intval($nivel) == 0){
                Storage::disk('departamentoUNASAM')->delete($imagen);
                Storage::disk('jefedeparUNASAM')->delete($imagen2);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('departamentoFacultad')->delete($imagen);
                Storage::disk('jefedeparFacultad')->delete($imagen2);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
            }


        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('descripcion' => $descripcion);
            $reglas2 = array('descripcion' => 'required');

            $input3  = array('director' => $director);
            $reglas3 = array('director' => 'required');

            $input4  = array('descripcion_director' => $descripcion_director);
            $reglas4 = array('descripcion_director' => 'required');

            $input5  = array('descripcion_corta_director' => $descripcion_corta_director);
            $reglas5 = array('descripcion_corta_director' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);
            $validator5 = Validator::make($input5, $reglas5);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre del Departamento Académico';
                $selector='txtnombre';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción del Departamento Académico';
                $selector='editor1';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el Nombre del Jefe del Departamento Académico';
                $selector='txtdirector';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar la Descripción ';
                $selector='editor2';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator5->fails())
            {
                $result='0';
                $msj='Debe ingresar la Descripción Corta del Jefe del Departamento Académico';
                $selector='txtdescripcion_corta_director';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            else{


                $departamento = new Departamentoacademico();

                $departamento->nombre = $nombre;
                $departamento->descripcion = $descripcion;
                $departamento->direccion = $direccion;
                $departamento->telefono = $telefono;
                $departamento->email = $email;
                $departamento->tieneimagen = $tieneimagen;
                $departamento->url = $imagen;
                $departamento->director = $director;
                $departamento->descripcion_director = $descripcion_director;
                $departamento->descripcion_corta_director = $descripcion_corta_director;
                $departamento->tieneimagen_director = $tieneimagen_director;
                $departamento->url_director = $imagen2;
                $departamento->activo = $activo;
                $departamento->borrado = '0';
                $departamento->user_id = Auth::user()->id;
                $departamento->facultad_id=$facultad_id;


                $departamento->save();


                $msj='Nuevo Departamento Académico registrado con Éxito';

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
        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $email = $request->email;
        $tieneimagen = $request->tieneimagen;
        $url = $request->url;
        $director = $request->director;
        $descripcion_director = $request->descripcion_director;
        $descripcion_corta_director = $request->descripcion_corta_director;
        $tieneimagen_director = $request->tieneimagen_director;
        $url_director = $request->url_director;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $imagen2="";
        $img2=$request->imagen2;
        $segureImg2=0;


        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;

        $oldImg=$request->oldimg;
        $oldImg2=$request->oldimg2;

        if ($request->hasFile('imagen')) { 

            $aux='departamento-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen' => $img) ;
            $reglas = array('imagen' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen principal no es una imagen válida, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagenE';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen principal tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
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

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('departamentoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('departamentoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('departamentoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                }

                if($subir){
                    $imagen=$nuevoNombre;
                }
                else{
                    $msj="Error al subir la imagen principal, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenE';
                }
            }
        }

        if ($request->hasFile('imagen2')) { 

            $aux='jefedepar-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen2' => $img2) ;
            $reglas = array('imagen2' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen2' => $img2) ;
            $reglas2 = array('imagen2' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen de jefe de departamento académico no es una imagen válida, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagen2E';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen de jefe de departamento académico tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagen2E';
            }

            else
            {
                //$nombre=$img2->getClientOriginalName();
                $extension=$img2->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                
                /* $img2R = Image::make($img2);
                $img2R->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('jefedeparUNASAM')->put($nuevoNombre, \File::get($img2));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $img2R);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('jefedeparFacultad')->put($nuevoNombre, \File::get($img2));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $img2R);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('jefedeparProgramaEstudio')->put($nuevoNombre, \File::get($img2));
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $img2R);
                }

                if($subir){
                    $imagen2=$nuevoNombre;
                }
                else{
                    $msj="Error al subir la imagen de jefe de departamento académico, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen2E';
                }
            }
        }

        if($segureImg==1){
            
            if(intval($nivel) == 0){
                Storage::disk('departamentoUNASAM')->delete($imagen);
                Storage::disk('jefedeparUNASAM')->delete($imagen2);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('departamentoFacultad')->delete($imagen);
                Storage::disk('jefedeparFacultad')->delete($imagen2);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
            }
        }
        elseif($segureImg2==1){
            
            if(intval($nivel) == 0){
                Storage::disk('departamentoUNASAM')->delete($imagen);
                Storage::disk('jefedeparUNASAM')->delete($imagen2);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('departamentoFacultad')->delete($imagen);
                Storage::disk('jefedeparFacultad')->delete($imagen2);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
            }
        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('descripcion' => $descripcion);
            $reglas2 = array('descripcion' => 'required');

            $input3  = array('director' => $director);
            $reglas3 = array('director' => 'required');

            $input4  = array('descripcion_director' => $descripcion_director);
            $reglas4 = array('descripcion_director' => 'required');

            $input5  = array('descripcion_corta_director' => $descripcion_corta_director);
            $reglas5 = array('descripcion_corta_director' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);
            $validator5 = Validator::make($input5, $reglas5);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre del Departamento Académico';
                $selector='txtnombreE';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción del Departamento Académico';
                $selector='editor3';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el Nombre del Jefe del Departamento Académico';
                $selector='txtdirectorE';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar la Descripción ';
                $selector='editor4';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            elseif ($validator5->fails())
            {
                $result='0';
                $msj='Debe ingresar la Descripción Corta del Jefe del Departamento Académico';
                $selector='txtdescripcion_corta_directorE';

                if(intval($nivel) == 0){
                    Storage::disk('departamentoUNASAM')->delete($imagen);
                    Storage::disk('jefedeparUNASAM')->delete($imagen2);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('departamentoFacultad')->delete($imagen);
                    Storage::disk('jefedeparFacultad')->delete($imagen2);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('departamentoProgramaEstudio')->delete($imagen);
                    Storage::disk('jefedeparProgramaEstudio')->delete($imagen2);
                }
            }
            else{

                if($tieneimagen == 0 && $oldImg != null && $oldImg != ''){
                    if(intval($nivel) == 0){
                        Storage::disk('departamentoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('departamentoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('departamentoProgramaEstudio')->delete($oldImg);
                    }
                }

                if($tieneimagen_director == 0 && $oldImg2 != null && $oldImg2 != ''){
                    if(intval($nivel) == 0){
                        Storage::disk('jefedeparUNASAM')->delete($oldImg2);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('jefedeparFacultad')->delete($oldImg2);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('jefedeparProgramaEstudio')->delete($oldImg2);
                    }
                }


                $departamento = Departamentoacademico::findOrFail($id);

                $departamento->nombre = $nombre;
                $departamento->descripcion = $descripcion;
                $departamento->direccion = $direccion;
                $departamento->telefono = $telefono;
                $departamento->email = $email;
                $departamento->tieneimagen = $tieneimagen;

                if(strlen($imagen)>0)
                {
                    if(intval($nivel) == 0){
                        Storage::disk('departamentoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('departamentoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('departamentoProgramaEstudio')->delete($oldImg);
                    }

                    $departamento->url = $imagen;
                }
                
                $departamento->director = $director;
                $departamento->descripcion_director = $descripcion_director;
                $departamento->descripcion_corta_director = $descripcion_corta_director;
                $departamento->tieneimagen_director = $tieneimagen_director;

                if(strlen($imagen2)>0)
                {
                    if(intval($nivel) == 0){
                        Storage::disk('jefedeparUNASAM')->delete($oldImg2);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('jefedeparFacultad')->delete($oldImg2);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('jefedeparProgramaEstudio')->delete($oldImg2);
                    }

                    $departamento->url_director = $imagen2;
                }


                
                $departamento->activo = $activo;
                $departamento->user_id = Auth::user()->id;

                $departamento->save();


                $msj='El Departamento Académico ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $noticia = Departamentoacademico::findOrFail($id);
        $noticia->activo=$estado;
        $noticia->save();

        if(strval($estado)=="0"){
            $msj='El Departamento Académico fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Departamento Académico fue Activado exitosamente';
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

        $departamento = Departamentoacademico::findOrFail($id);

        Storage::disk('departamentoFacultad')->delete($departamento->url);
        Storage::disk('jefedeparFacultad')->delete($departamento->url_director);
        
        //$task->delete();
        $departamento->borrado='1';
        $departamento->user_id=Auth::user()->id;
        $departamento->save();

        $msj='Departamento Académico Eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
