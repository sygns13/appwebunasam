<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Indicadorsineace;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class IndicadorsineaceController extends Controller
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
        $submodulo = 59;

        if(accesoUser([1,2]) || (accesoUser([3,4,5]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $programas = [];

            $modulo="perfilingresoprograma";

            if(accesoUser([1,2])){
                $programas = Programaestudio::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $programa = Programaestudio::find($dato->programa_id);
                        array_push($programas, $programa);
                    } 
                }
            }

            return view('paginassineace.perfilingreso.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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
        $submodulo = 60;

        if(accesoUser([1,2]) || (accesoUser([3,4,5]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $programas = [];

            $modulo="perfilegresoprograma";

            if(accesoUser([1,2])){
                $programas = Programaestudio::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $programa = Programaestudio::find($dato->programa_id);
                        array_push($programas, $programa);
                    } 
                }
            }

            return view('paginassineace.perfilegreso.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $queryZero=Indicadorsineace::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            $query->orWhere('descripcion','like','%'.$buscar.'%');
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

        $registros = $queryZero->where('tipo', $tipo)
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
        ini_set('memory_limit','256M');
        ini_set('upload_max_filesize','20M');

        $titulo=$request->titulo;
        $tieneimagen=$request->tieneimagen;
        $tienearchivo=$request->tienearchivo;
        $descripcion=$request->descripcion;
        $url=$request->url;
        $urlfile=$request->urlfile;
        $tipo=$request->tipo;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nombreArchivo="";

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $result='1';
        $msj='';
        $selector='';

        if(intval($tieneimagen) == 1){
            if ($request->hasFile('imagen')) { 

                $aux='indicadorsineace-img_'.date('d-m-Y').'-'.date('H-i-s');
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
                        $subir=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre, \File::get($img));
                       //$subir=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre, \File::get($img));
                      //$subir=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                          $subir=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre, \File::get($img));
                       // $subir=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre, $imgR);
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
                $tieneimagen = 0;
            }
            /* else{
                $msj="Debe de adjuntar una imagen válida, ingrese un archivo";
                $segureImg=1;
                $result='0';
                $selector='imagen';
            } */
        }

        if(intval($tienearchivo) == 1){

            if($request->hasFile('archivo')){

                $nombreArchivo=$request->nombrefile;
    
                $aux2='indicadorsineace-file_'.date('d-m-Y').'-'.date('H-i-s');
                $input2  = array('archivo' => $file) ;
                $reglas2 = array('archivo' => 'required|file:1,1024000');
                $validatorF = Validator::make($input2, $reglas2);
    
                $inputNA  = array('archivonombre' => $nombreArchivo);
                $reglasNA = array('archivonombre' => 'required');
                $validatorNA = Validator::make($inputNA, $reglasNA);            
    
                if ($validatorF->fails())
                {
    
                $segureFile=1;
                $msj="El archivo adjunto ingresado tiene un tamaño superior a 100 MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo2';
                }
                elseif($validatorNA->fails()){
                    $segureFile=1;
                    $msj="Si va a registrar un archivo adjunto, debe de ingresar un nombre válido con el que se verá en el portal web";
                    $result='0';
                    $selector='txtArchivoAdjunto';
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
                            $subir2=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 1){
                            $subir2=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 2){
                            $subir2=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                        // $subir2=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre2, $imgR);
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
                        $selector='archivo2';
                    }
                }
    
            }
            else{
                $tienearchivo = 0;
            }
            /* else{
                $msj="Debe de adjuntar un archivo adjunto válido, ingrese un archivo";
                $segureImg=1;
                $result='0';
                $selector='archivo';
            } */

        }
        

        if($segureImg==1){
        
            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($imagen);
            }

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($archivo);
            }
        }
        elseif($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($imagen);
            }

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($archivo);
            }
        }
        else{

            $input2  = array('titulo' => $titulo);
            $reglas2 = array('titulo' => 'required');

            $validator2 = Validator::make($input2, $reglas2);

            if ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el Título';
                $selector='txttitulo';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                $indicadorsineace = new Indicadorsineace();
                $indicadorsineace->titulo=$titulo;
                $indicadorsineace->tieneimagen=$tieneimagen;
                $indicadorsineace->tienearchivo=$tienearchivo;
                $indicadorsineace->descripcion=$descripcion;
                $indicadorsineace->url=$imagen;
                $indicadorsineace->urlfile=$archivo;
                $indicadorsineace->tipo=$tipo;
                $indicadorsineace->activo=$activo;
                $indicadorsineace->borrado='0';
                $indicadorsineace->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $indicadorsineace->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $indicadorsineace->programaestudio_id=$programaestudio_id;
                }
                $indicadorsineace->user_id=Auth::user()->id;
                $indicadorsineace->nombrefile=$nombreArchivo;

                $indicadorsineace->save();

                $msj='Nuevo Registro Guardado con Éxito';

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

        $titulo=$request->titulo;
        $tieneimagen=$request->tieneimagen;
        $tienearchivo=$request->tienearchivo;
        $descripcion=$request->descripcion;
        $url=$request->url;
        $urlfile=$request->urlfile;
        $tipo=$request->tipo;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nombreArchivo="";

        $result='1';
        $msj='';
        $selector='';

        $oldImg=$request->oldimg;
        $oldFile=$request->oldfile;

        $nivel=$request->v1;

        if ($request->hasFile('imagen')) { 

            $tieneimagen=1;

            $aux='indicadorsineace-img_'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                   // $subir=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 1){
                   // $subir=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 2){
                   // $subir=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre, \File::get($img));
                }

                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir la imagen, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenE';
                }
            }
        }
        else{
            $tieneimagen=0;
        }


        if($request->hasFile('archivo')){

            $tienearchivo=1;



            $nombreArchivo=$request->nombrefile;

            $aux2='indicadorsineace-file_'.date('d-m-Y').'-'.date('H-i-s');
            $input2  = array('archivo' => $file) ;
            $reglas2 = array('archivo' => 'required|file:1,20480');
            $validatorF = Validator::make($input2, $reglas2);

            $inputNA  = array('archivonombre' => $nombreArchivo);
            $reglasNA = array('archivonombre' => 'required');
            $validatorNA = Validator::make($inputNA, $reglasNA);

          

            if ($validatorF->fails())
            {

            $segureFile=1;
            $msj="El archivo adjunto ingresado tiene una extensión no válida, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='archivo2';
            }
            elseif($validatorNA->fails()){
                $segureFile=1;
                $msj="Si va a registrar un archivo adjunto, debe de ingresar un nombre válido con el que se verá en el portal web";
                $result='0';
                $selector='txtArchivoAdjuntoE';
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
                            $subir2=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('indicadorsineaceUNASAM')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 1){
                            $subir2=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre2, \File::get($file));
                        //$subir2=Storage::disk('indicadorsineaceFacultad')->put($nuevoNombre2, $imgR);
                        }
                        elseif(intval($nivel) == 2){
                            $subir2=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                        // $subir2=Storage::disk('indicadorsineaceProgramaEstudio')->put($nuevoNombre2, $imgR);
                        }

                if($subir2){
                    $archivo=$nuevoNombre2;
                }
                else{
                    $msj="Error al subir el archivo adjunto, intentelo nuevamente luego";
                    $segureFile=1;
                    $result='0';
                    $selector='archivoE';
                }
                }
                else {
                    $segureFile=1;
                    $msj="El archivo adjunto ingresado tiene una extensión no válida, ingrese otro archivo o limpie el formulario";
                    $result='0';
                    $selector='archivo2E';
                }
            }

        }
        else{
            $tienearchivo=0;
        }


        if($segureImg==1){

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($imagen);
            }

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($archivo);
            }
        }
        elseif($segureFile==1){
            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($imagen);
            }

            if(intval($nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($archivo);
            }
        }
        else{


            $input2  = array('titulo' => $titulo);
            $reglas2 = array('titulo' => 'required');

            $validator2 = Validator::make($input2, $reglas2);

            if ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el Título';
                $selector='txttituloE';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                if(strlen($imagen)>0 && strlen($archivo)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('indicadorsineaceUNASAM')->delete($oldImg);
                        Storage::disk('indicadorsineaceUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('indicadorsineaceFacultad')->delete($oldImg);
                        Storage::disk('indicadorsineaceFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('indicadorsineaceProgramaEstudio')->delete($oldImg);
                        Storage::disk('indicadorsineaceProgramaEstudio')->delete($oldFile);
                    }


                    $indicadorsineace = Indicadorsineace::findOrFail($id);
                    $indicadorsineace->titulo=$titulo;
                    $indicadorsineace->tieneimagen=$tieneimagen;
                    $indicadorsineace->tienearchivo=$tienearchivo;
                    $indicadorsineace->descripcion=$descripcion;
                    $indicadorsineace->url=$imagen;
                    $indicadorsineace->urlfile=$archivo;
                    $indicadorsineace->activo=$activo;
                    $indicadorsineace->user_id=Auth::user()->id;
                    $indicadorsineace->nombrefile=$nombreArchivo;

                    $indicadorsineace->save();
                }
                elseif(strlen($imagen)==0 && strlen($archivo)>0){

                    if(intval($nivel) == 0){
                        Storage::disk('indicadorsineaceUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('indicadorsineaceFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('indicadorsineaceProgramaEstudio')->delete($oldFile);
                    }


                    $indicadorsineace = Indicadorsineace::findOrFail($id);
                    $indicadorsineace->titulo=$titulo;
                    $indicadorsineace->tienearchivo=$tienearchivo;
                    $indicadorsineace->descripcion=$descripcion;
                    $indicadorsineace->urlfile=$archivo;
                    $indicadorsineace->activo=$activo;
                    $indicadorsineace->user_id=Auth::user()->id;
                    $indicadorsineace->nombrefile=$nombreArchivo;

                    $indicadorsineace->save();

                }
                elseif(strlen($imagen)>0 && strlen($archivo)==0){
                            
                        if(intval($nivel) == 0){
                            Storage::disk('indicadorsineaceUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('indicadorsineaceFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('indicadorsineaceProgramaEstudio')->delete($oldImg);
                        }

                        $indicadorsineace = Indicadorsineace::findOrFail($id);
                        $indicadorsineace->titulo=$titulo;
                        $indicadorsineace->tieneimagen=$tieneimagen;
                        $indicadorsineace->descripcion=$descripcion;
                        $indicadorsineace->url=$imagen;
                        $indicadorsineace->activo=$activo;
                        $indicadorsineace->user_id=Auth::user()->id;

                        $indicadorsineace->save();

                }
                else
                {
                    $indicadorsineace = Indicadorsineace::findOrFail($id);
                    $indicadorsineace->titulo=$titulo;
                    $indicadorsineace->descripcion=$descripcion;
                    $indicadorsineace->activo=$activo;
                    $indicadorsineace->user_id=Auth::user()->id;

                    $indicadorsineace->save();
                }

                $msj='El Registro ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $indicadorsineace = Indicadorsineace::findOrFail($id);
        $indicadorsineace->activo=$estado;
        $indicadorsineace->save();

        if(strval($estado)=="0"){
            $msj='El Registro fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Registro fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $indicadorsineace = Indicadorsineace::findOrFail($id);

        if(intval($indicadorsineace->nivel) == 0){
            Storage::disk('indicadorsineaceUNASAM')->delete($indicadorsineace->url);
        }
        elseif(intval($indicadorsineace->nivel) == 1){
            Storage::disk('indicadorsineaceFacultad')->delete($indicadorsineace->url);
        }
        elseif(intval($indicadorsineace->nivel) == 2){
            Storage::disk('indicadorsineaceProgramaEstudio')->delete($indicadorsineace->url);
        }


        $indicadorsineace->url='';
        $indicadorsineace->tieneimagen=0;
        $indicadorsineace->save();

        $msj='Se eliminó la imagen exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }

    public function deleteFile($id)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $indicadorsineace = Indicadorsineace::findOrFail($id);

        if(intval($indicadorsineace->nivel) == 0){
            Storage::disk('indicadorsineaceUNASAM')->delete($indicadorsineace->urlfile);
        }
        elseif(intval($indicadorsineace->nivel) == 1){
            Storage::disk('indicadorsineaceFacultad')->delete($indicadorsineace->urlfile);
        }
        elseif(intval($indicadorsineace->nivel) == 2){
            Storage::disk('indicadorsineaceProgramaEstudio')->delete($indicadorsineace->urlfile);
        }


        $indicadorsineace->urlfile='';
        $indicadorsineace->nombrefile='';
        $indicadorsineace->tienearchivo=0;
        $indicadorsineace->save();

        $msj='Se eliminó el archivo exitosamente';

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



        $indicadorsineace = Indicadorsineace::findOrFail($id);

        if(Strlen($indicadorsineace->url) > 0){
            if(intval($indicadorsineace->nivel) == 0){
                Storage::disk('indicadorsineaceUNASAM')->delete($indicadorsineace->url);
                Storage::disk('indicadorsineaceUNASAM')->delete($indicadorsineace->urlfile);
            }
            elseif(intval($indicadorsineace->nivel) == 1){
                Storage::disk('indicadorsineaceFacultad')->delete($indicadorsineace->url);
                Storage::disk('indicadorsineaceFacultad')->delete($indicadorsineace->urlfile);
            }
            elseif(intval($indicadorsineace->nivel) == 2){
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($indicadorsineace->url);
                Storage::disk('indicadorsineaceProgramaEstudio')->delete($indicadorsineace->urlfile);
            }
        }
        
        //$task->delete();
        $indicadorsineace->borrado='1';
        $indicadorsineace->user_id=Auth::user()->id;
        $indicadorsineace->save();

        $msj='Registro eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
