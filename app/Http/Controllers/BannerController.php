<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Banner;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;



class BannerController extends Controller
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
        $submodulo = 2;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="bannerportal";

            return view('adminportal.banner.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
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

            $modulo="bannerfacultad";

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

            return view('adminfacultad.banner.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
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

        $queryZero=Banner::where('borrado','0')
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

        $banners = $queryZero->orderBy('posision')
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $banners->total(),
                'current_page'=> $banners->currentPage(),
                'per_page'=> $banners->perPage(),
                'last_page'=> $banners->lastPage(),
                'from'=> $banners->firstItem(),
                'to'=> $banners->lastItem(),
            ],
            'banners'=>$banners
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

            $aux='banner_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('banerUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('banerFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
            $msj="Debe de adjuntar una imagen del banner válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }

        if($segureImg==1){
        
            if(intval($nivel) == 0){
                Storage::disk('banerUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('banerFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('banerProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('posision' => $posision);
            $reglas1 = array('posision' => 'required');

            $validator1 = Validator::make($input1, $reglas1);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición del Banner en formato numérico';
                $selector='txtposision';
            }
            else{

                if($nombre == null || Strlen($nombre) == 0){
                    $nombre = "";
                }

                $banner = new Banner();
                $banner->posision=$posision;
                $banner->nombre=$nombre;
                $banner->url=$imagen;
                $banner->activo=$activo;
                $banner->borrado='0';
                $banner->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $banner->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $banner->programaestudio_id=$programaestudio_id;
                }
                $banner->user_id=Auth::user()->id;

                $banner->save();

                $msj='Nuevo Banner Registrado con Éxito';

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

            $aux='banner_fec'.date('d-m-Y').'-'.date('H-i-s');
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
                   // $subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('banerUNASAM')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 1){
                   // $subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('banerFacultad')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 2){
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('banerUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('banerFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('banerProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('posision' => $posision);
            $reglas1 = array('posision' => 'required');

            $validator1 = Validator::make($input1, $reglas1);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición del Banner en formato numérico';
                $selector='txtposisionE';
            }
            else{

                if($nombre == null || Strlen($nombre) == 0){
                    $nombre = "";
                }

                if(strlen($imagen)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('banerUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('banerFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('banerProgramaEstudio')->delete($oldImg);
                    }


                    $banner = Banner::findOrFail($id);
                    $banner->posision=$posision;
                    $banner->nombre=$nombre;
                    $banner->url=$imagen;
                    $banner->activo=$activo;
                    $banner->user_id=Auth::user()->id;

                    $banner->save();
                }
                else
                {
                    $banner = Banner::findOrFail($id);
                    $banner->posision=$posision;
                    $banner->nombre=$nombre;
                    $banner->activo=$activo;
                    $banner->user_id=Auth::user()->id;

                    $banner->save();
                }

                $msj='El Banner ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $banner = Banner::findOrFail($id);
        $banner->activo=$estado;
        $banner->save();

        if(strval($estado)=="0"){
            $msj='El Banner fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Banner fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $banner = Banner::findOrFail($id);

        if(intval($banner->nivel) == 0){
            Storage::disk('banerUNASAM')->delete($image);
        }
        elseif(intval($banner->nivel) == 1){
            Storage::disk('banerFacultad')->delete($image);
        }
        elseif(intval($banner->nivel) == 2){
            Storage::disk('banerProgramaEstudio')->delete($image);
        }


        $banner->url='';
        $banner->save();

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



        $banner = Banner::findOrFail($id);

        if(Strlen($banner->url) > 0){
            if(intval($banner->nivel) == 0){
                Storage::disk('banerUNASAM')->delete($banner->url);
            }
            elseif(intval($banner->nivel) == 1){
                Storage::disk('banerFacultad')->delete($banner->url);
            }
            elseif(intval($banner->nivel) == 2){
                Storage::disk('banerProgramaEstudio')->delete($banner->url);
            }
        }
        
        //$task->delete();
        $banner->borrado='1';
        $banner->user_id=Auth::user()->id;
        $banner->save();

        $msj='Banner eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
