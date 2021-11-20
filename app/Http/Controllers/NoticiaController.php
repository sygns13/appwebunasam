<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Noticia;
use App\Imagennoticia;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;

class NoticiaController extends Controller
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
        $submodulo = 5;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo)) ){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $fecha=date("Y-m-d");

            $modulo="noticiaportal";

            return view('adminportal.noticia.index',compact('tipouser','modulo','fecha','permisos','rolModulos','rolSubModulos'));
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
        $submodulo = 31;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $fecha=date("Y-m-d");

            $modulo="noticiafacultad";

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

            return view('adminfacultad.noticia.index',compact('tipouser','modulo','fecha', 'permisos','rolModulos','rolSubModulos','facultads'));
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

        $queryZero=Noticia::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('titular','like','%'.$buscar.'%');
            $query->orWhere('desarrollo','like','%'.$buscar.'%');
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

        $noticias = $queryZero->orderBy('fecha','desc')
        ->orderBy('hora','desc')
        ->orderBy('id')
        ->paginate(10);

        foreach ($noticias as $key => $dato) {    
            $imagennoticia = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $dato->id)->get();
            $dato->imagennoticia = $imagennoticia;
        }

          return [
            'pagination'=>[
                'total'=> $noticias->total(),
                'current_page'=> $noticias->currentPage(),
                'per_page'=> $noticias->perPage(),
                'last_page'=> $noticias->lastPage(),
                'from'=> $noticias->firstItem(),
                'to'=> $noticias->lastItem(),
            ],
            'noticias'=>$noticias
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

        $fecha = $request->fecha;
        $hora = $request->hora;
        $titular = $request->titular;
        $desarrollo = $request->desarrollo;
        $activo=$request->activo;

        $tieneimagen = 1;

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

            $aux='noticia_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('noticianUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('noticiaFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('noticiaProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
            $msj="Debe de adjuntar una imagen válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }

        if($segureImg==1){

            if(intval($nivel) == 0){
                Storage::disk('noticianUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('noticiaFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('noticiaProgramaEstudio')->delete($imagen);
            }


        }
        else{
            $input1  = array('fecha' => $fecha);
            $reglas1 = array('fecha' => 'required');

            $input2  = array('hora' => $hora);
            $reglas2 = array('hora' => 'required');

            $input3  = array('titular' => $titular);
            $reglas3 = array('titular' => 'required');

            $input4  = array('desarrollo' => $desarrollo);
            $reglas4 = array('desarrollo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la fecha de la Noticia';
                $selector='txtfecha';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora de la Noticia';
                $selector='txthora';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titular de la Noticia';
                $selector='txttitular';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo de la Noticia';
                $selector='editor1';
            }
            else{


                $noticia = new Noticia();

                $noticia->fecha = $fecha;
                $noticia->hora = $hora;
                //$noticia->url = $imagen;
                $noticia->titular = $titular;
                $noticia->desarrollo = $desarrollo;
                $noticia->tieneimagen = $tieneimagen;
                $noticia->activo = $activo;
                $noticia->borrado = '0';
                $noticia->user_id = Auth::user()->id;
                $noticia->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $noticia->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $noticia->programaestudio_id=$programaestudio_id;
                }

                $noticia->save();

                $imagenNoticia = new Imagennoticia();
                $imagenNoticia->nombre = $titular;
                $imagenNoticia->descripcion = $desarrollo;
                $imagenNoticia->url = $imagen;
                $imagenNoticia->posicion = 0;
                $imagenNoticia->activo = '1';
                $imagenNoticia->borrado = '0';
                $imagenNoticia->noticia_id = $noticia->id;

                $imagenNoticia->save();

                $msj='Nueva Noticia Registrada con Éxito';

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

        $fecha = $request->fecha;
        $hora = $request->hora;
        $titular = $request->titular;
        $desarrollo = $request->desarrollo;
        $activo=$request->activo;

        $tieneimagen = 1;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;

        $oldImg=$request->oldimg;

        if ($request->hasFile('imagen')) { 

            $aux='noticia_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                
                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('noticianUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('noticiaFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('noticiaProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
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
                Storage::disk('noticianUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('noticiaFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('noticiaProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('fecha' => $fecha);
            $reglas1 = array('fecha' => 'required');

            $input2  = array('hora' => $hora);
            $reglas2 = array('hora' => 'required');

            $input3  = array('titular' => $titular);
            $reglas3 = array('titular' => 'required');

            $input4  = array('desarrollo' => $desarrollo);
            $reglas4 = array('desarrollo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la fecha de la Noticia';
                $selector='txtfechaE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora de la Noticia';
                $selector='txthoraE';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titular de la Noticia';
                $selector='txttitularE';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo de la Noticia';
                $selector='editor2';
            }
            else{


                $noticia = Noticia::findOrFail($id);

                $noticia->fecha = $fecha;
                $noticia->hora = $hora;
                $noticia->titular = $titular;
                $noticia->desarrollo = $desarrollo;
                $noticia->activo = $activo;
               
                $noticia->save();

                if(strlen($imagen)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('noticianUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('noticiaFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('noticiaProgramaEstudio')->delete($oldImg);
                    }

                    $imagenNot = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia->id)->where('posicion',0)->first();

                    if($imagenNot != null && $imagenNot->id != null){

                        $imagenNoticia = Imagennoticia::findOrFail($imagenNot->id);
                        $imagenNoticia->nombre = $titular;
                        $imagenNoticia->descripcion = $desarrollo;
                        $imagenNoticia->url = $imagen;

                        $imagenNoticia->save();
                    } 
                    else{
                        $imagenNoticia = new Imagennoticia();

                        $imagenNoticia->nombre = $titular;
                        $imagenNoticia->descripcion = $desarrollo;
                        $imagenNoticia->url = $imagen;
                        $imagenNoticia->posicion = 0;
                        $imagenNoticia->activo = '1';
                        $imagenNoticia->borrado = '0';
                        $imagenNoticia->noticia_id = $noticia->id;

                        $imagenNoticia->save();
                    }
                }
                else{

                    $imagenNot = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia->id)->where('posicion',0)->first();
                    if($imagenNot != null && $imagenNot->id != null){

                        $imagenNoticia = Imagennoticia::findOrFail($imagenNot->id);
                        $imagenNoticia->nombre = $titular;
                        $imagenNoticia->descripcion = $desarrollo;

                        $imagenNoticia->save();
                    } 
                }

                $msj='La Noticia ha sido modificada con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image, $nivel)
    {
        $result='1';
        $msj='';
        $selector='';

        $imagenNoticia = Imagennoticia::findOrFail($id);

        if(intval($nivel) == 0){
            Storage::disk('noticianUNASAM')->delete($image);
        }
        elseif(intval($nivel) == 1){
            Storage::disk('noticiaFacultad')->delete($image);
        }
        elseif(intval($nivel) == 2){
            Storage::disk('noticiaProgramaEstudio')->delete($image);
        }


        $imagenNoticia->delete();

        $msj='Se eliminó la imagen exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $noticia = Noticia::findOrFail($id);
        $noticia->activo=$estado;
        $noticia->save();

        if(strval($estado)=="0"){
            $msj='La Noticia fue Desactivada exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='La Noticia fue Activada exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function destroy($id)
    {
        $result='1';
        $msj='1';

        $noticia = Noticia::findOrFail($id);
        $imagenesNoticia = Imagennoticia::where('noticia_id', $noticia->id)->get();

        foreach ($imagenesNoticia as $key => $dato) {
            $imagen = Imagennoticia::findOrFail($dato->id);

            if(intval($noticia->nivel) == 0){
                Storage::disk('noticianUNASAM')->delete($imagen->url);
            }
            elseif(intval($noticia->nivel) == 1){
                Storage::disk('noticiaFacultad')->delete($imagen->url);
            }
            elseif(intval($noticia->nivel) == 2){
                Storage::disk('noticiaProgramaEstudio')->delete($imagen->url);
            }

            $imagen->delete();
        }
        
        //$task->delete();
        $noticia->borrado='1';
        $noticia->user_id=Auth::user()->id;
        $noticia->save();

        $msj='Noticia eliminada exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
