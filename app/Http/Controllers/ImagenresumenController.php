<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Resumen;
use App\Imagenresumen;

use stdClass;
use DB;
use Storage;

use Image;

class ImagenresumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resumen_id=$request->resumen_id;

        $imagenresumen = Imagenresumen::where('activo','1')->where('borrado','0')->where('resumen_id', $resumen_id)->get();

          return [
            'imagenresumen'=>$imagenresumen
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
        $resumen_id=$request->resumen_id;
        $url=$request->url;
        $activo=1;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $exi='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        if ($request->hasFile('imagen')) { 

            $aux='resumen-'.date('d-m-Y').'-'.date('H-i-s');
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
                //$subir=Storage::disk('resumenFacultad')->put($nuevoNombre, \File::get($img));

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('resumenUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('resumenFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('resumenProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('resumenUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('resumenFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('resumenProgramaEstudio')->delete($imagen);
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

                $imagenResumen = new Imagenresumen();
                $imagenResumen->nombre = $nombre;
                $imagenResumen->descripcion = $descripcion;
                $imagenResumen->url = $imagen;
                $imagenResumen->posicion = $posicion;
                $imagenResumen->activo = '1';
                $imagenResumen->borrado = '0';
                $imagenResumen->resumen_id = $resumen_id;

                $band=Imagenresumen::where('activo',1)->where('borrado',0)->where('resumen_id',$resumen_id)->where('posicion',$posicion)->exists();
                if ($band==true) {
                    $exi='0';
                    $msj='Esta posición de imagen ya existe';       
                }else{
                    $exi='1';
                    $imagenResumen->save();
                    $msj='Nueva imagen Registrada con Éxito';
                }
            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector,'exi'=>$exi]);
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
        $resumen_id=$request->resumen_id;
        $url=$request->url;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $exi='';
        $selector='';

        $oldImg=$request->oldimg;

        $nivel=$request->v1;

        if ($request->hasFile('imagen')) { 

            $aux='resumen'.date('d-m-Y').'-'.date('H-i-s');
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
                //$subir=Storage::disk('resumenFacultad')->put($nuevoNombre, \File::get($img));

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('resumenUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('resumenFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('resumenProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
           // Storage::disk('resumenFacultad')->delete($imagen);

            if(intval($nivel) == 0){
                Storage::disk('resumenUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('resumenFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('resumenProgramaEstudio')->delete($imagen);
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
                $band=Imagenresumen::where('activo',1)->where('borrado',0)->where('resumen_id',$resumen_id)->where('posicion',$posicion)->where('id','<>',$id)->exists();
                if ($band==true) {
                    $exi='0';
                    $msj='Esta posición de imagen ya existe';       
                }else{
                    $exi='1';
                    if(strlen($imagen)>0){
                    //Storage::disk('resumenFacultad')->delete($oldImg);
                    if(intval($nivel) == 0){
                        Storage::disk('resumenUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('resumenFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('resumenProgramaEstudio')->delete($oldImg);
                    }
                    $resumen = Imagenresumen::findOrFail($id);
                    $resumen->nombre=$nombre;
                    $resumen->descripcion=$descripcion;
                    $resumen->posicion=$posicion;
                    $resumen->url=$imagen;
                    $resumen->save();
                }else{
                    $resumen = Imagenresumen::findOrFail($id);
                    $resumen->nombre=$nombre;
                    $resumen->descripcion=$descripcion;
                    $resumen->posicion=$posicion;
                    $resumen->save();
                }
                $msj='La Imagen ha sido modificada con éxito';
                }
            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector,'exi'=>$exi]);
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

        $resumen = Imagenresumen::findOrFail($id);

        $padreresumen = Resumen::findOrFail($resumen->resumen_id);

        if(Strlen($resumen->url) > 0){
            //Storage::disk('resumenFacultad')->delete($resumen->url);

            if(intval($padreresumen->nivel) == 0){
                Storage::disk('resumenUNASAM')->delete($resumen->url);
            }
            elseif(intval($padreresumen->nivel) == 1){
                Storage::disk('resumenFacultad')->delete($resumen->url);
            }
            elseif(intval($padreresumen->nivel) == 2){
                Storage::disk('resumenProgramaEstudio')->delete($resumen->url);
            }
        }
        
        $resumen->delete();

        $msj='Imagen eliminada exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
    public function numsiguiente($id){
        $idnot=$id;
        $queryZero=Imagenresumen::where('activo',1)->where('borrado',0)->where('resumen_id',$idnot)->max('posicion');
        $idban=$queryZero+1;
        return response()->json(["idban"=>$idban]);
    }
}
