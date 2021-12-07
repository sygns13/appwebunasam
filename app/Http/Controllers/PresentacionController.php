<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Presentacion;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class PresentacionController extends Controller
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
        $submodulo = 3;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="presentacionportal";

            return view('adminportal.presentacion.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
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

        $nivel = 1;
        $modulo = 4;
        $submodulo = 29;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $facultads = [];

            $modulo="presentacionfacultad";

            if(accesoUser([1,2])){
                $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $facultad = Facultad::find($dato->facultad_id);
                        array_push($facultads, $facultad);
                    } 
                }
            }

            return view('adminfacultad.presentacion.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
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
        $modulo = 6;
        $submodulo = 50;

        if(accesoUser([1,2]) || (accesoUser([3,4,5]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $programas = [];

            $modulo="presentacionprograma";

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

            return view('adminprograma.presentacion.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        //$buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $queryZero=Presentacion::where('borrado','0');
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/

        if($facultad_id != null && intval($facultad_id) > 0){
            $queryZero->where('facultad_id',$facultad_id);
        }

        if($programaestudio_id != null && intval($programaestudio_id) > 0){
            $queryZero->where('programaestudio_id',$programaestudio_id);
        }

        if($nivel != null){
            $queryZero->where('nivel',$nivel);
        }

        $presentacion = $queryZero->first();

          return [
            'presentacion'=>$presentacion
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
        $subtitulo=$request->subtitulo;
        $descripcion=$request->descripcion;
        $url=$request->url;
        $tieneimagen=$request->tieneimagen;

        $activo=1;

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

        if(intval($tieneimagen) == 1){
            if ($request->hasFile('imagen')) { 

                $aux='presentacion-'.date('d-m-Y').'-'.date('H-i-s');
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

                    //$subir=Storage::disk('presentacionFacultad')->put($nuevoNombre, \File::get($img));

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('presentacionUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('presentacionFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('presentacionProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                if(($img == null|| $img == "null") && ($oldImg!="" && $oldImg!=null && $oldImg!="null")){
                    $imagen="";
                    $oldImg="";
                }
                else{
                    $msj="Debe seleccionar una imagen";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen';
                }
            }
        }

        

        if($segureImg==1){
            

            if(intval($nivel) == 0){
                Storage::disk('presentacionUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('presentacionFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('presentacionProgramaEstudio')->delete($imagen);
            }


        }
        else{
            $input1  = array('titulo' => $titulo);
            $reglas1 = array('titulo' => 'required');

            $input2  = array('descripcion' => $descripcion);
            $reglas2 = array('descripcion' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el título de la Presentación';
                $selector='txttitulo';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción de la Presentación';
                $selector='txtdescripcion';
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('presentacionUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('presentacionFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('presentacionProgramaEstudio')->delete($oldImg);
                    }
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($subtitulo == null){
                    $subtitulo = "";
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('presentacionUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('presentacionFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('presentacionProgramaEstudio')->delete($oldImg);
                        }

                        

                        $presentacion = new Presentacion();
                        $presentacion->titulo=$titulo;
                        $presentacion->subtitulo=$subtitulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->borrado='0';
                        $presentacion->nivel=$nivel;
                        $presentacion->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $presentacion->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $presentacion->programaestudio_id=$programaestudio_id;
                        }

                        $presentacion->save();
                    }
                    else
                    {
                        $presentacion = new Presentacion();
                        $presentacion->titulo=$titulo;
                        $presentacion->subtitulo=$subtitulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->borrado='0';
                        $presentacion->nivel=$nivel;
                        $presentacion->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $presentacion->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $presentacion->programaestudio_id=$programaestudio_id;
                        }

                        $presentacion->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('presentacionUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('presentacionFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('presentacionProgramaEstudio')->delete($oldImg);
                        }

                        $presentacion = Presentacion::findOrFail($id);
                        $presentacion->titulo=$titulo;
                        $presentacion->subtitulo=$subtitulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->user_id=Auth::user()->id;

                        $presentacion->save();
                    }
                    else
                    {
                        $presentacion = Presentacion::findOrFail($id);
                        $presentacion->titulo=$titulo;
                        $presentacion->subtitulo=$subtitulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->user_id=Auth::user()->id;

                        $presentacion->save();
                    }
                }
                

                $msj='Presentación Registrada con Éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        $presentacion = Presentacion::findOrFail($id);

        if(intval($presentacion->nivel) == 0){
            Storage::disk('presentacionUNASAM')->delete($presentacion->url);
        }
        elseif(intval($presentacion->nivel) == 1){
            Storage::disk('presentacionFacultad')->delete($presentacion->url);
        }
        elseif(intval($presentacion->nivel) == 2){
            Storage::disk('presentacionProgramaEstudio')->delete($presentacion->url);
        }


        $presentacion->url='';
        $presentacion->save();

        $msj='Se eliminó la imagen exitosamente';

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
