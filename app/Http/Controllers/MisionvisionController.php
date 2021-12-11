<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Misionvision;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class MisionvisionController extends Controller
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
        $modulo = 2;
        $submodulo = 12;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="misionvisionportal";

            return view('paginasportal.misionvision.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
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
        $modulo = 5;
        $submodulo = 37;

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

            $modulo="misionvisionfec";

            return view('paginasfacultad.misionvision.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
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
        $submodulo = 58;

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

            $modulo="misionvisionprograma";

            return view('paginassineace.misionvision.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','programas'));
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

        $queryZero=Misionvision::where('borrado','0');
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

        $mision = $queryZero
        ->where('tipo',1)
        ->first();

        $queryZero2=Misionvision::where('borrado','0');
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/

            if($facultad_id != null && intval($facultad_id) > 0){
                $queryZero2->where('facultad_id',$facultad_id);
            }
    
            if($programaestudio_id != null && intval($programaestudio_id) > 0){
                $queryZero2->where('programaestudio_id',$programaestudio_id);
            }
    
            if($nivel != null){
                $queryZero2->where('nivel',$nivel);
            }

        $vision = $queryZero2
        ->where('tipo',2)
        ->first();

          return [
            'mision'=>$mision,
            'vision'=>$vision,
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
        $descripcion=$request->descripcion;
        $tipo=$request->tipo;
        $url=$request->url;
        $tieneimagen=$request->tieneimagen;

        $activo=1;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $oldImg=$request->oldimg;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if(intval($tieneimagen) == 1){
            if ($request->hasFile('imagen')) { 

                $aux='misionvision-'.date('d-m-Y').'-'.date('H-i-s');
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
                    //$subir=Storage::disk('misionvisionFacultad')->put($nuevoNombre, \File::get($img));

                    /* $imgR = Image::make($img);
                    $imgR->resize(1500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    })->stream(); */

                    //$subir=Storage::disk('misionvisionFacultad')->put($nuevoNombre, \File::get($img));

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('misionvisionUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('misionvisionFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('misionvisionProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                    $imagen=$oldImg;
                    $oldImg="";
                }
                else{
                    $msj="Debe de adjuntar una imagen del válida";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen';
                }
            }
        }

        

        if($segureImg==1){
            //Storage::disk('misionvisionFacultad')->delete($imagen);

            if(intval($nivel) == 0){
                Storage::disk('misionvisionUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('misionvisionFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('misionvisionProgramaEstudio')->delete($imagen);
            }
        }
        else{

            $titulo = "";
            if(intval($tipo) == 1){

                if(intval($nivel) == 0){
                    $titulo = "MISIÓN DE LA UNASAM";
                }
                elseif(intval($nivel) == 1){
                    $titulo = "MISIÓN DE LA FACULTAD";
                }
                elseif(intval($nivel) == 2){
                    $titulo = "MISIÓN DEL PROGRAMA DE ESTUDIOS";
                }
            }
            elseif(intval($tipo) == 2){

                if(intval($nivel) == 0){
                    $titulo = "VISIÓN DE LA UNASAM";
                }
                elseif(intval($nivel) == 1){
                    $titulo = "VISIÓN DE LA FACULTAD";
                }
                elseif(intval($nivel) == 2){
                    $titulo = "VISIÓN DEL PROGRAMA DE ESTUDIOS";
                }
            }


            $input2  = array('descripcion' => $descripcion);
            $reglas2 = array('descripcion' => 'required');


            $validator2 = Validator::make($input2, $reglas2);

            if ($validator2->fails())
            {
                $result='0';
                if(intval($tipo) == 1){
                    $msj='Debe ingresar la descripción de la Misión';
                    $selector='txtdescripcionM';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar la descripción de la Visión';
                    $selector='txtdescripcionV';
                }
                
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('misionvisionUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('misionvisionFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('misionvisionProgramaEstudio')->delete($oldImg);
                    }
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('misionvisionUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('misionvisionFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('misionvisionProgramaEstudio')->delete($oldImg);
                        }

                        $misionvision = new Misionvision();
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->borrado='0';
                        $misionvision->nivel=$nivel;
                        $misionvision->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $misionvision->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $misionvision->programaestudio_id=$programaestudio_id;
                        }

                        $misionvision->save();
                    }
                    else
                    {
                        $misionvision = new Misionvision();
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->borrado='0';
                        $misionvision->nivel=$nivel;
                        $misionvision->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $misionvision->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $misionvision->programaestudio_id=$programaestudio_id;
                        }

                        $misionvision->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('misionvisionUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('misionvisionFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('misionvisionProgramaEstudio')->delete($oldImg);
                        }

                        $misionvision = Misionvision::findOrFail($id);
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->nivel=$nivel;
                        $misionvision->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $misionvision->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $misionvision->programaestudio_id=$programaestudio_id;
                        }

                        $misionvision->save();
                    }
                    else
                    {
                        $misionvision = Misionvision::findOrFail($id);
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->nivel=$nivel;
                        $misionvision->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $misionvision->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $misionvision->programaestudio_id=$programaestudio_id;
                        }

                        $misionvision->save();
                    }
                }
                

                if(intval($tipo) == 1){
                    $msj='Misión Registrada con Éxito';
                }
                elseif(intval($tipo) == 2){
                    $msj='Visión Registrada con Éxito';
                }

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        

        $misionvision = Misionvision::findOrFail($id);

        if(intval($misionvision->nivel) == 0){
            Storage::disk('misionvisionUNASAM')->delete($image);
        }
        elseif(intval($misionvision->nivel) == 1){
            Storage::disk('misionvisionFacultad')->delete($image);
        }
        elseif(intval($misionvision->nivel) == 2){
            Storage::disk('misionvisionProgramaEstudio')->delete($image);
        }

        $misionvision->url='';
        $misionvision->save();

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
