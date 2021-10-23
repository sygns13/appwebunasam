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

class ImagennoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $noticia_id=$request->noticia_id;

        $imagennoticia = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia_id)->get();

          return [
            'imagennoticia'=>$imagennoticia
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
        $descripcion=$request->descripcion;
        $posicion=$request->posicion;
        $noticia_id=$request->noticia_id;
        $url=$request->url;
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

        if ($request->hasFile('imagen')) { 

            $aux='noticia_'.date('d-m-Y').'-'.date('H-i-s');
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
            $selector='imagenDetalle';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenDetalle';
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
                    $selector='imagenDetalle';
                }
            }
        }
        else{
            $msj="Debe de adjuntar una imagen válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagenDetalle';
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
            $input0  = array('nombre' => $nombre);
            $reglas0 = array('nombre' => 'required');

            $input1  = array('posicion' => $posicion);
            $reglas1 = array('posicion' => 'required');

            $validator0 = Validator::make($input0, $reglas0);
            $validator1 = Validator::make($input1, $reglas1);

            if ($validator0->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la imagen';
                $selector='txtnombreImg';
            }
            elseif ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición de la Imagen en formato numérico';
                $selector='txtposicion';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                $imagenNoticia = new Imagennoticia();
                $imagenNoticia->nombre = $nombre;
                $imagenNoticia->descripcion = $descripcion;
                $imagenNoticia->url = $imagen;
                $imagenNoticia->posicion = $posicion;
                $imagenNoticia->activo = '1';
                $imagenNoticia->borrado = '0';
                $imagenNoticia->noticia_id = $noticia_id;

                $imagenNoticia->save();

                $msj='Nueva imagen Registrada con Éxito';

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
        $descripcion=$request->descripcion;
        $posicion=$request->posicion;
        $noticia_id=$request->noticia_id;
        $url=$request->url;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;

        $oldImg=$request->oldimg;

        if ($request->hasFile('imagen')) { 

            $aux='noticia_'.date('d-m-Y').'-'.date('H-i-s');
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
            $selector='imagenEDetalle';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como imagen tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenEDetalle';
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
                    $selector='imagenEDetalle';
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
            $input0  = array('nombre' => $nombre);
            $reglas0 = array('nombre' => 'required');

            $input1  = array('posicion' => $posicion);
            $reglas1 = array('posicion' => 'required');

            $validator0 = Validator::make($input0, $reglas0);
            $validator1 = Validator::make($input1, $reglas1);

            if ($validator0->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la imagen';
                $selector='txtnombreImgE';
            }
            elseif ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición de la Imagen en formato numérico';
                $selector='txtposicionE';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

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
                    $noticia = Imagennoticia::findOrFail($id);
                    $noticia->nombre=$nombre;
                    $noticia->descripcion=$descripcion;
                    $noticia->posicion=$posicion;
                    $noticia->url=$imagen;


                    $noticia->save();
                }
                else
                {
                    $noticia = Imagennoticia::findOrFail($id);
                    $noticia->nombre=$nombre;
                    $noticia->descripcion=$descripcion;
                    $noticia->posicion=$posicion;


                    $noticia->save();
                }

                $msj='La Imagen ha sido modificada con éxito';

            }
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

        $noticia = Imagennoticia::findOrFail($id);

        $noticiaPadre = Noticia::findOrFail($noticia->noticia_id);

        if(Strlen($noticia->url) > 0){

            if(intval($noticiaPadre->nivel) == 0){
                Storage::disk('noticianUNASAM')->delete($noticia->url);
            }
            elseif(intval($noticiaPadre->nivel) == 1){
                Storage::disk('noticiaFacultad')->delete($noticia->url);
            }
            elseif(intval($noticiaPadre->nivel) == 2){
                Storage::disk('noticiaProgramaEstudio')->delete($noticia->url);
            }
        }
        
        $noticia->delete();

        $msj='Imagen eliminada exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
