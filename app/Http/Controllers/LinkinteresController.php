<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Linkinteres;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;

class LinkinteresController extends Controller
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
        $submodulo = 10;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="linkinteresportal";

            return view('adminportal.linkinteres.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
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
        $submodulo = 28;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="linkinteresfacultad";

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

            return view('adminfacultad.linkinteres.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
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

        $queryZero=Linkinteres::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
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

        $linkinteress = $queryZero->orderBy('posision')
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $linkinteress->total(),
                'current_page'=> $linkinteress->currentPage(),
                'per_page'=> $linkinteress->perPage(),
                'last_page'=> $linkinteress->lastPage(),
                'from'=> $linkinteress->firstItem(),
                'to'=> $linkinteress->lastItem(),
            ],
            'linkinteress'=>$linkinteress
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

        $posision=$request->posision;
        $nombre=$request->nombre;
        $url=$request->url;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $result='1';
        $msj='';
        $selector='';

        if ($request->hasFile('imagen')) { 

            $aux='linkinteres_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('linkinteresUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('linkinteresUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('linkinteresFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('linkinteresFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('linkinteresProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('linkinteresProgramaEstudio')->put($nuevoNombre, $imgR);
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
            $msj="Debe de adjuntar una imagen del linkinteres válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }

        if($segureImg==1){
        
            if(intval($nivel) == 0){
                Storage::disk('linkinteresUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('linkinteresFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('linkinteresProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('posision' => $posision);
            $reglas1 = array('posision' => 'required');

            $input2  = array('nombre' => $nombre);
            $reglas2 = array('nombre' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición del Linkinteres en formato numérico';
                $selector='txtposision';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la URL del link de Interés';
                $selector='txtnombre';
            }
            else{

                $linkinteres = new Linkinteres();
                $linkinteres->posision=$posision;
                $linkinteres->nombre=$nombre;
                $linkinteres->url=$imagen;
                $linkinteres->activo=$activo;
                $linkinteres->borrado='0';
                $linkinteres->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $linkinteres->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $linkinteres->programaestudio_id=$programaestudio_id;
                }
                $linkinteres->user_id=Auth::user()->id;

                $linkinteres->save();

                $msj='Nuevo Link de Interés Registrado con Éxito';

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

        $posision=$request->posision;
        $nombre=$request->nombre;
        $url=$request->url;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $oldImg=$request->oldimg;

        $nivel=$request->v1;

        if ($request->hasFile('imagen')) { 

            $aux='linkinteres_fec'.date('d-m-Y').'-'.date('H-i-s');
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
                   // $subir=Storage::disk('linkinteresUNASAM')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('linkinteresUNASAM')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 1){
                   // $subir=Storage::disk('linkinteresFacultad')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('linkinteresFacultad')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 2){
                   // $subir=Storage::disk('linkinteresProgramaEstudio')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('linkinteresProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
        if($segureImg==1){

            if(intval($nivel) == 0){
                Storage::disk('linkinteresUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('linkinteresFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('linkinteresProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('posision' => $posision);
            $reglas1 = array('posision' => 'required');

            $input2  = array('nombre' => $nombre);
            $reglas2 = array('nombre' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición del Linkinteres en formato numérico';
                $selector='txtposisionE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la URL del link de Interés';
                $selector='txtnombre';
            }
            else{

                if(strlen($imagen)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('linkinteresUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('linkinteresFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('linkinteresProgramaEstudio')->delete($oldImg);
                    }


                    $linkinteres = Linkinteres::findOrFail($id);
                    $linkinteres->posision=$posision;
                    $linkinteres->nombre=$nombre;
                    $linkinteres->url=$imagen;
                    $linkinteres->activo=$activo;
                    $linkinteres->user_id=Auth::user()->id;

                    $linkinteres->save();
                }
                else
                {
                    $linkinteres = Linkinteres::findOrFail($id);
                    $linkinteres->posision=$posision;
                    $linkinteres->nombre=$nombre;
                    $linkinteres->activo=$activo;
                    $linkinteres->user_id=Auth::user()->id;

                    $linkinteres->save();
                }

                $msj='El Link de Interés ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $linkinteres = Linkinteres::findOrFail($id);
        $linkinteres->activo=$estado;
        $linkinteres->save();

        if(strval($estado)=="0"){
            $msj='El Link de Interés fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Link de Interés fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $linkinteres = Linkinteres::findOrFail($id);

        if(intval($linkinteres->nivel) == 0){
            Storage::disk('linkinteresUNASAM')->delete($image);
        }
        elseif(intval($linkinteres->nivel) == 1){
            Storage::disk('linkinteresFacultad')->delete($image);
        }
        elseif(intval($linkinteres->nivel) == 2){
            Storage::disk('linkinteresProgramaEstudio')->delete($image);
        }


        $linkinteres->url='';
        $linkinteres->save();

        $msj='Se eliminó la imagen exitosamente';

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



        $linkinteres = Linkinteres::findOrFail($id);

        if(Strlen($linkinteres->url) > 0){
            if(intval($linkinteres->nivel) == 0){
                Storage::disk('linkinteresUNASAM')->delete($linkinteres->url);
            }
            elseif(intval($linkinteres->nivel) == 1){
                Storage::disk('linkinteresFacultad')->delete($linkinteres->url);
            }
            elseif(intval($linkinteres->nivel) == 2){
                Storage::disk('linkinteresProgramaEstudio')->delete($linkinteres->url);
            }
        }
        
        //$task->delete();
        $linkinteres->borrado='1';
        $linkinteres->user_id=Auth::user()->id;
        $linkinteres->save();

        $msj='Link de Interés eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
