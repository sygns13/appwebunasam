<?php

namespace App\Http\Controllers;

use App\Docente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;

use App\Persona;
use App\Tipouser;
use App\User;


use Excel;
set_time_limit(600);

use Storage;
use DateTime;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Departamentoacademico;
use App\Programaestudio;

class DocenteController extends Controller
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
        $submodulo = 46;

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

            $modulo="docentesfacultad";

            $departamentos=Departamentoacademico::where('borrado','0')->where('activo','1')
            ->orderBy('facultad_id','desc')
            ->orderBy('nombre','desc')
            ->orderBy('id')
            ->get();

            return view('paginasfacultad.docentes.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads','departamentos'));
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
        $modulo = 7;
        $submodulo = 70;

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

            $modulo="docentesprograma";
            
            return view('paginassineace.docentes.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $queryZero=DB::table('docentes')
        ->leftjoin('departamentoacademicos', 'departamentoacademicos.id', '=', 'docentes.departamentoacademico_id')
        ->where('docentes.borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('docentes.nombre','like','%'.$buscar.'%');
            $query->orWhere('docentes.especialidad','like','%'.$buscar.'%');
            $query->orWhere('docentes.categoria','like','%'.$buscar.'%');
            $query->orWhere('docentes.regimen','like','%'.$buscar.'%');
            $query->orWhere('docentes.condicion','like','%'.$buscar.'%');
            $query->orWhere('departamentoacademicos.nombre','like','%'.$buscar.'%');
            });
        
        if($facultad_id != null && intval($facultad_id) > 0){
            $queryZero->where('docentes.facultad_id',$facultad_id);
        }

        if($programaestudio_id != null && intval($programaestudio_id) > 0){
            $queryZero->where('docentes.programaestudio_id',$programaestudio_id);
        }

        if($nivel != null){
            $queryZero->where('docentes.nivel',$nivel);
        }

        $queryZero->orderBy('docentes.nombre')
        ->orderBy('docentes.categoria')
        ->orderBy('docentes.regimen')
        ->orderBy('docentes.condicion')
        ->orderBy('docentes.id');


        $docentes = $queryZero->select('docentes.id',
                                'docentes.nombre',
                                'docentes.tipo_documento',
                                'docentes.documento',
                                'docentes.grados',
                                'docentes.tieneimagen',
                                'docentes.urlimagen',
                                'docentes.tienelink',
                                'docentes.urllink',
                                'docentes.fecha',
                                'docentes.activo',
                                'docentes.borrado',
                                'docentes.nivel',
                                'docentes.facultad_id',
                                'docentes.programaestudio_id',
                                'docentes.departamentoacademico_id',
                                'docentes.categoria',
                                'docentes.regimen',
                                'docentes.condicion',
                                'docentes.experiencia',
                                'docentes.publicaciones',
                                'docentes.investigaciones',
                                'docentes.especialidad',
                                'docentes.telefono',
                                'docentes.email',
                                DB::Raw("IFNULL( `departamentoacademicos`.`nombre` , '' ) as departamento")
                                )->paginate(10);
        
     return [
        'pagination'=>[
            'total'=> $docentes->total(),
            'current_page'=> $docentes->currentPage(),
            'per_page'=> $docentes->perPage(),
            'last_page'=> $docentes->lastPage(),
            'from'=> $docentes->firstItem(),
            'to'=> $docentes->lastItem(),
        ],
        'docentes'=>$docentes
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

        $nombre=$request->nombre;
        $grados=$request->grados;
        $tieneimagen=$request->tieneimagen;
        $urlimagen=$request->urlimagen;
        $tienelink=$request->tienelink;
        $urllink=$request->urllink;
        $fecha=$request->fecha;
        $activo=$request->activo;
        $departamentoacademico_id=$request->departamentoacademico_id;
        $categoria=$request->categoria;
        $regimen=$request->regimen;
        $condicion=$request->condicion;
        $experiencia=$request->experiencia;
        $publicaciones=$request->publicaciones;
        $investigaciones=$request->investigaciones;
        $especialidad=$request->especialidad;
        $telefono=$request->telefono;
        $email=$request->email;
        $tipo_documento=$request->tipo_documento;
        $documento=$request->documento;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $result='1';
        $msj='';
        $selector='';

        if($tieneimagen != null && $tieneimagen == 1){
            if ($request->hasFile('imagen')) { 

                $aux='docente-'.date('d-m-Y').'-'.date('H-i-s');
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

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('docenteUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('docenteUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('docenteFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('docenteFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('docenteProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    // $subir=Storage::disk('docenteProgramaEstudio')->put($nuevoNombre, $imgR);
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
                $msj="Debe de adjuntar una imagen válida, ingrese un archivo";
                $segureImg=1;
                $result='0';
                $selector='imagen';
            }
                        
        }


        if($tienelink != null && $tienelink == 1){
            if($request->hasFile('archivo')){

                $nombreArchivo=$request->nombrefile;

                $aux2='docente_'.date('d-m-Y').'-'.date('H-i-s');
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

                    if($extension2=="pdf" || $extension2=="doc" || $extension2=="docx" || $extension2=="xls" || $extension2=="xlsx" || $extension2=="ppt" || $extension2=="pptx" || $extension2=="PDF" || $extension2=="DOC" || $extension2=="DOCX" || $extension2=="XLS" || $extension2=="XLSX" || $extension2=="PPT" || $extension2=="PTTX")
                    {

                        $subir2=false;
                        if(intval($nivel) == 0){
                            $subir2=Storage::disk('docdocenteUNASAM')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('docdocenteUNASAM')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 1){
                            $subir2=Storage::disk('docdocenteFacultad')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('docdocenteFacultad')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 2){
                            $subir2=Storage::disk('docdocenteProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                        // $subir2=Storage::disk('docdocenteProgramaEstudio')->put($nuevoNombre2, $imgR);
                        }

                    if($subir2){
                        $archivo=$nuevoNombre2;
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
                $msj="Debe de adjuntar un archivo adjunto válido, ingrese un archivo";
                $segureFile=1;
                $result='0';
                $selector='archivo';
            }   
        }

        if($segureImg==1){
        
            if(intval($nivel) == 0){
                Storage::disk('docenteUNASAM')->delete($imagen);
                Storage::disk('docdocenteUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('docenteFacultad')->delete($imagen);
                Storage::disk('docdocenteFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('docenteProgramaEstudio')->delete($imagen);
                Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
            }
        }
        elseif($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('docenteUNASAM')->delete($imagen);
                Storage::disk('docdocenteUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('docenteFacultad')->delete($imagen);
                Storage::disk('docdocenteFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('docenteProgramaEstudio')->delete($imagen);
                Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
            }
        }
        else{
            $input1  = array('departamentoacademico_id' => $departamentoacademico_id);
            $reglas1 = array('departamentoacademico_id' => 'required');
    
            $input2  = array('tipo_documento' => $tipo_documento);
            $reglas2 = array('tipo_documento' => 'required');
    
            $input3  = array('documento' => $documento);
            $reglas3 = array('documento' => 'required');
    
            $input4  = array('nombre' => $nombre);
            $reglas4 = array('nombre' => 'required');
    
            $input5  = array('especialidad' => $especialidad);
            $reglas5 = array('especialidad' => 'required');
    
            $input6  = array('condicion' => $condicion);
            $reglas6 = array('condicion' => 'required');
    
            $input7  = array('categoria' => $categoria);
            $reglas7 = array('categoria' => 'required');
    
            $input8  = array('regimen' => $regimen);
            $reglas8 = array('regimen' => 'required');
    
            $input9  = array('fecha' => $fecha);
            $reglas9 = array('fecha' => 'required');
    

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);
            $validator5 = Validator::make($input5, $reglas5);
            $validator6 = Validator::make($input6, $reglas6);
            $validator7 = Validator::make($input7, $reglas7);
            $validator8 = Validator::make($input8, $reglas8);
            $validator9 = Validator::make($input9, $reglas9);

            if (($validator1->fails() || intval($departamentoacademico_id) == 0) && $nivel==1)
            {
                $result='0';
                $msj='Debe seleccionar el Departamento Académico del Docente';
                $selector='cbudepartamentoacademico_id';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif($validator2->fails() || intval($tipo_documento) == 0){
                $result='0';
                $msj='Seleccione un tipo de Documento Válido';
                $selector='cbutipo_documento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Complete el Documento de Identidad del Docente';
                $selector='txtdocumento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }

            }
            elseif (strlen($documento)<8)
            {
                $result='0';
                $msj='Complete un N° de Documento de Identidad Válido';
                $selector='txtdocumento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }

            }
            elseif ($validator4->fails()) {
                $result='0';
                $msj='Ingrese el nombre completo del Docente';
                $selector='txtnombre';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator5->fails()) {
                $result='0';
                $msj='Ingrese la especialidad del Docente';
                $selector='txtespecialidad';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator6->fails()) {
                $result='0';
                $msj='Ingrese la condición del Docente';
                $selector='txtcondicion';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator7->fails()) {
                $result='0';
                $msj='Ingrese la categoría del Docente';
                $selector='txtcategoria';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator8->fails()) {
                $result='0';
                $msj='Ingrese el regimen del Docente';
                $selector='txtregimen';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator9->fails()) {
                $result='0';
                $msj='Ingrese la fecha de ingreso del Docente a la UNASAM';
                $selector='txtfecha';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            else{



                $newDocente = new Docente();
                $newDocente->nombre=$nombre;
                $newDocente->grados=$grados;
                $newDocente->tieneimagen=$tieneimagen;
                $newDocente->urlimagen=$imagen;
                $newDocente->tienelink=$tienelink;
                $newDocente->urllink=$archivo;
                $newDocente->fecha=$fecha;
                $newDocente->activo=$activo;
                $newDocente->borrado='0';
                $newDocente->nivel=$nivel;
                
                if($facultad_id != null && intval($facultad_id) > 0){
                    $newDocente->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $newDocente->programaestudio_id=$programaestudio_id;
                }

                $newDocente->departamentoacademico_id=$departamentoacademico_id;
                $newDocente->categoria=$categoria;
                $newDocente->regimen=$regimen;
                $newDocente->condicion=$condicion;
                $newDocente->experiencia=$experiencia;
                $newDocente->publicaciones=$publicaciones;
                $newDocente->investigaciones=$investigaciones;
                $newDocente->especialidad=$especialidad;
                $newDocente->telefono=$telefono;
                $newDocente->email=$email;
                $newDocente->tipo_documento=$tipo_documento;
                $newDocente->documento=$documento;
                $newDocente->user_id=Auth::user()->id;

                $newDocente->save();

                $msj='Nuevo Docente Registrado con Éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
 
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

        $nombre=$request->nombre;
        $grados=$request->grados;
        $tieneimagen=$request->tieneimagen;
        $urlimagen=$request->urlimagen;
        $tienelink=$request->tienelink;
        $urllink=$request->urllink;
        $fecha=$request->fecha;
        $activo=$request->activo;
        $departamentoacademico_id=$request->departamentoacademico_id;
        $categoria=$request->categoria;
        $regimen=$request->regimen;
        $condicion=$request->condicion;
        $experiencia=$request->experiencia;
        $publicaciones=$request->publicaciones;
        $investigaciones=$request->investigaciones;
        $especialidad=$request->especialidad;
        $telefono=$request->telefono;
        $email=$request->email;
        $tipo_documento=$request->tipo_documento;
        $documento=$request->documento;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nivel=$request->v1;

        $oldImg=$request->oldimg;
        $oldFile=$request->oldfile;
        

        $result='1';
        $msj='';
        $selector='';

        if($tieneimagen != null && $tieneimagen == 1){
            if ($request->hasFile('imagen')) { 

                $aux='docente-'.date('d-m-Y').'-'.date('H-i-s');
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

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('docenteUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('docenteUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('docenteFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('docenteFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('docenteProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    // $subir=Storage::disk('docenteProgramaEstudio')->put($nuevoNombre, $imgR);
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
                if($oldImg != null && $oldImg != ""){
                    $imagen=$oldImg;
                }
                else{
                    $msj="Debe ingresar una imagen";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen';
                }
            }
                        
        }


        if($tienelink != null && $tienelink == 1){
            if($request->hasFile('archivo')){

                $nombreArchivo=$request->nombrefile;

                $aux2='docente_'.date('d-m-Y').'-'.date('H-i-s');
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

                    if($extension2=="pdf" || $extension2=="doc" || $extension2=="docx" || $extension2=="xls" || $extension2=="xlsx" || $extension2=="ppt" || $extension2=="pptx" || $extension2=="PDF" || $extension2=="DOC" || $extension2=="DOCX" || $extension2=="XLS" || $extension2=="XLSX" || $extension2=="PPT" || $extension2=="PTTX")
                    {

                        $subir2=false;
                        if(intval($nivel) == 0){
                            $subir2=Storage::disk('docdocenteUNASAM')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('docdocenteUNASAM')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 1){
                            $subir2=Storage::disk('docdocenteFacultad')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('docdocenteFacultad')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 2){
                            $subir2=Storage::disk('docdocenteProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                        // $subir2=Storage::disk('docdocenteProgramaEstudio')->put($nuevoNombre2, $imgR);
                        }

                    if($subir2){
                        $archivo=$nuevoNombre2;
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

                if($oldFile != null && $oldFile != ""){
                    $archivo=$oldFile;
                }
                else{
                    $msj="Debe de adjuntar un archivo adjunto válido, ingrese un archivo";
                    $segureFile=1;
                    $result='0';
                    $selector='archivo';
                }
            }   
        }

        if($segureImg==1){
        
            if(intval($nivel) == 0){
                Storage::disk('docenteUNASAM')->delete($imagen);
                Storage::disk('docdocenteUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('docenteFacultad')->delete($imagen);
                Storage::disk('docdocenteFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('docenteProgramaEstudio')->delete($imagen);
                Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
            }
        }
        elseif($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('docenteUNASAM')->delete($imagen);
                Storage::disk('docdocenteUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('docenteFacultad')->delete($imagen);
                Storage::disk('docdocenteFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('docenteProgramaEstudio')->delete($imagen);
                Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
            }
        }
        else{
            $input1  = array('departamentoacademico_id' => $departamentoacademico_id);
            $reglas1 = array('departamentoacademico_id' => 'required');
    
            $input2  = array('tipo_documento' => $tipo_documento);
            $reglas2 = array('tipo_documento' => 'required');
    
            $input3  = array('documento' => $documento);
            $reglas3 = array('documento' => 'required');
    
            $input4  = array('nombre' => $nombre);
            $reglas4 = array('nombre' => 'required');
    
            $input5  = array('especialidad' => $especialidad);
            $reglas5 = array('especialidad' => 'required');
    
            $input6  = array('condicion' => $condicion);
            $reglas6 = array('condicion' => 'required');
    
            $input7  = array('categoria' => $categoria);
            $reglas7 = array('categoria' => 'required');
    
            $input8  = array('regimen' => $regimen);
            $reglas8 = array('regimen' => 'required');
    
            $input9  = array('fecha' => $fecha);
            $reglas9 = array('fecha' => 'required');
    

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);
            $validator5 = Validator::make($input5, $reglas5);
            $validator6 = Validator::make($input6, $reglas6);
            $validator7 = Validator::make($input7, $reglas7);
            $validator8 = Validator::make($input8, $reglas8);
            $validator9 = Validator::make($input9, $reglas9);

            if (($validator1->fails() || intval($departamentoacademico_id) == 0) && $nivel==1)
            {
                $result='0';
                $msj='Debe seleccionar el Departamento Académico del Docente';
                $selector='cbudepartamentoacademico_id';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }

            }
            elseif($validator2->fails() || intval($tipo_documento) == 0){
                $result='0';
                $msj='Seleccione un tipo de Documento Válido';
                $selector='cbutipo_documento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Complete el Documento de Identidad del Docente';
                $selector='txtdocumento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }

            }
            elseif (strlen($documento)<8)
            {
                $result='0';
                $msj='Complete un N° de Documento de Identidad Válido';
                $selector='txtdocumento';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }

            }
            elseif ($validator4->fails()) {
                $result='0';
                $msj='Ingrese el nombre completo del Docente';
                $selector='txtnombre';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator5->fails()) {
                $result='0';
                $msj='Ingrese la especialidad del Docente';
                $selector='txtespecialidad';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator6->fails()) {
                $result='0';
                $msj='Ingrese la condición del Docente';
                $selector='txtcondicion';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator7->fails()) {
                $result='0';
                $msj='Ingrese la categoría del Docente';
                $selector='txtcategoria';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator8->fails()) {
                $result='0';
                $msj='Ingrese el regimen del Docente';
                $selector='txtregimen';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            elseif ($validator9->fails()) {
                $result='0';
                $msj='Ingrese la fecha de ingreso del Docente a la UNASAM';
                $selector='txtfecha';

                if(intval($nivel) == 0){
                    Storage::disk('docenteUNASAM')->delete($imagen);
                    Storage::disk('docdocenteUNASAM')->delete($archivo);
                }
                elseif(intval($nivel) == 1){
                    Storage::disk('docenteFacultad')->delete($imagen);
                    Storage::disk('docdocenteFacultad')->delete($archivo);
                }
                elseif(intval($nivel) == 2){
                    Storage::disk('docenteProgramaEstudio')->delete($imagen);
                    Storage::disk('docdocenteProgramaEstudio')->delete($archivo);
                }
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('docenteUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('docenteFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('docenteProgramaEstudio')->delete($oldImg);
                    }
                }

                if(Strlen($oldFile) > 0 && intval($tienelink) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('docdocenteUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('docdocenteFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('docdocenteProgramaEstudio')->delete($oldFile);
                    }
                }

                if(intval($tieneimagen) == 1 && $oldImg != $imagen){
                    if(intval($nivel) == 0){
                        Storage::disk('docenteUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('docenteFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('docenteProgramaEstudio')->delete($oldImg);
                    }
                }

                if(intval($tienelink) == 1 && $oldFile != $archivo){
                    if(intval($nivel) == 0){
                        Storage::disk('docdocenteUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('docdocenteFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('docdocenteProgramaEstudio')->delete($oldFile);
                    }
                }



                $editDocente = Docente::find($id);
                $editDocente->nombre=$nombre;
                $editDocente->grados=$grados;
                $editDocente->tieneimagen=$tieneimagen;
                $editDocente->urlimagen=$imagen;
                $editDocente->tienelink=$tienelink;
                $editDocente->urllink=$archivo;
                $editDocente->fecha=$fecha;
                $editDocente->activo=$activo;
                $editDocente->departamentoacademico_id=$departamentoacademico_id;
                $editDocente->categoria=$categoria;
                $editDocente->regimen=$regimen;
                $editDocente->condicion=$condicion;
                $editDocente->experiencia=$experiencia;
                $editDocente->publicaciones=$publicaciones;
                $editDocente->investigaciones=$investigaciones;
                $editDocente->especialidad=$especialidad;
                $editDocente->telefono=$telefono;
                $editDocente->email=$email;
                $editDocente->tipo_documento=$tipo_documento;
                $editDocente->documento=$documento;
                $editDocente->user_id=Auth::user()->id;

                $editDocente->save();

                $msj='Docente modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

            
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $docente = Docente::findOrFail($id);
        $docente->activo=$estado;
        $docente->save();

        if(strval($estado)=="0"){
            $msj='El Docente fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Docente fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result='1';
        $msj='1';

        $docente = Docente::findOrFail($id);

        if(Strlen($docente->urlimagen) > 0){
            if(intval($docente->nivel) == 0){
                Storage::disk('docenteUNASAM')->delete($docente->urlimagen);
            }
            elseif(intval($docente->nivel) == 1){
                Storage::disk('docenteFacultad')->delete($docente->urlimagen);
            }
            elseif(intval($docente->nivel) == 2){
                Storage::disk('docenteProgramaEstudio')->delete($docente->urlimagen);
            }
        }

        if(Strlen($docente->urllink) > 0){
            if(intval($docente->nivel) == 0){
                Storage::disk('docdocenteUNASAM')->delete($docente->urllink);
            }
            elseif(intval($docente->nivel) == 1){
                Storage::disk('docdocenteFacultad')->delete($docente->urllink);
            }
            elseif(intval($docente->nivel) == 2){
                Storage::disk('docdocenteProgramaEstudio')->delete($docente->urllink);
            }
        }
        
        //$task->delete();
        $docente->borrado='1';
        $docente->user_id=Auth::user()->id;
        $docente->save();

        $msj='Registro eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }



}
