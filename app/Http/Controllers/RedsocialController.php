<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Redsocial;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

class RedsocialController extends Controller
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
        $submodulo = 9;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="redsocialportal";

            return view('adminportal.redsocial.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index1()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="redsocialfacultad";

            return view('adminfacultad.redsocial.index',compact('tipouser','modulo'));
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

        $queryZero=Redsocial::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
            $query->orWhere('urlredsocial','like','%'.$buscar.'%');
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

        $redsocials = $queryZero
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $redsocials->total(),
                'current_page'=> $redsocials->currentPage(),
                'per_page'=> $redsocials->perPage(),
                'last_page'=> $redsocials->lastPage(),
                'from'=> $redsocials->firstItem(),
                'to'=> $redsocials->lastItem(),
            ],
            'redsocials'=>$redsocials
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
        $urlredsocial=$request->urlredsocial;
        $url=$request->url;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if ($request->hasFile('imagen')) { 

            $aux='redsocial_-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen' => $img) ;
            $reglas = array('imagen' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo no es una imagen válida, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagen';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagen';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                $imgR = Image::make($img);
                $imgR->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();


                $subir=false;
                if(intval($nivel) == 0){
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, \File::get($img));
                   $subir=Storage::disk('redsocialUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, \File::get($img));
                  $subir=Storage::disk('redsocialFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      //$subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    $subir=Storage::disk('redsocialProgramaEstudio')->put($nuevoNombre, $imgR);
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
            $msj="Debe de adjuntar el logo de la red social como una imagen válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }

        if($segureImg==1){
            
            if(intval($nivel) == 0){
                Storage::disk('redsocialUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('redsocialFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('redsocialProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('urlredsocial' => $urlredsocial);
            $reglas2 = array('urlredsocial' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la Red Social';
                $selector='txtnombre';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la dirección URL de la Red Social';
                $selector='txturlredsocial';
            }
            else{


                $redsocial = new Redsocial();
                $redsocial->nombre=$nombre;
                $redsocial->urlredsocial=$urlredsocial;
                $redsocial->url=$imagen;
                $redsocial->activo=$activo;
                $redsocial->borrado='0';
                $redsocial->user_id=Auth::user()->id;
                $redsocial->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $redsocial->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $redsocial->programaestudio_id=$programaestudio_id;
                }

                $redsocial->save();

                $msj='Nuevo Registro de Red social registrado con Éxito';

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

        $nombre=$request->nombre;
        $urlredsocial=$request->urlredsocial;
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

            $aux='redsocial_'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo no es una imagen válida, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                $imgR = Image::make($img);
                $imgR->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                $subir=false;
                if(intval($nivel) == 0){
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, \File::get($img));
                   $subir=Storage::disk('redsocialUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, \File::get($img));
                  $subir=Storage::disk('redsocialFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      //$subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    $subir=Storage::disk('redsocialProgramaEstudio')->put($nuevoNombre, $imgR);
                }

                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir el logo, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenE';
                }
            }
        }
        if($segureImg==1){
            if(intval($nivel) == 0){
                Storage::disk('redsocialUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('redsocialFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('redsocialProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('urlredsocial' => $urlredsocial);
            $reglas2 = array('urlredsocial' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la Red Social';
                $selector='txtnombreE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la dirección URL de la Red Social';
                $selector='txturlredsocialE';
            }
            else{


                if(strlen($imagen)>0)
                {
                    if(intval($nivel) == 0){
                        Storage::disk('redsocialUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('redsocialFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('redsocialProgramaEstudio')->delete($oldImg);
                    }
                    $redsocial = Redsocial::findOrFail($id);
                    $redsocial->nombre=$nombre;
                    $redsocial->urlredsocial=$urlredsocial;
                    $redsocial->url=$imagen;
                    $redsocial->activo=$activo;
                    $redsocial->user_id=Auth::user()->id;

                    $redsocial->save();
                }
                else
                {
                    $redsocial = Redsocial::findOrFail($id);
                    $redsocial->nombre=$nombre;
                    $redsocial->urlredsocial=$urlredsocial;
                    $redsocial->activo=$activo;
                    $redsocial->user_id=Auth::user()->id;

                    $redsocial->save();
                }

                $msj='El registro de red social ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $redsocial = Redsocial::findOrFail($id);
        $redsocial->activo=$estado;
        $redsocial->save();

        if(strval($estado)=="0"){
            $msj='El registro de Red Social fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El registro de Red Social fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        $redsocial = Redsocial::findOrFail($id);

        if(intval($redsocial->nivel) == 0){
            Storage::disk('redsocialUNASAM')->delete($image);
        }
        elseif(intval($redsocial->nivel) == 1){
            Storage::disk('redsocialFacultad')->delete($image);
        }
        elseif(intval($redsocial->nivel) == 2){
            Storage::disk('redsocialProgramaEstudio')->delete($image);
        }

        $redsocial->url='';
        $redsocial->save();

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



        $redsocial = Redsocial::findOrFail($id);

        if(Strlen($redsocial->url) > 0){

            if(intval($redsocial->nivel) == 0){
                Storage::disk('redsocialUNASAM')->delete($redsocial->url);
            }
            elseif(intval($redsocial->nivel) == 1){
                Storage::disk('redsocialFacultad')->delete($redsocial->url);
            }
            elseif(intval($redsocial->nivel) == 2){
                Storage::disk('redsocialProgramaEstudio')->delete($redsocial->url);
            }
        }
        
        //$task->delete();
        $redsocial->borrado='1';
        $redsocial->user_id=Auth::user()->id;
        $redsocial->save();

        $msj='Registro de Red Social eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
