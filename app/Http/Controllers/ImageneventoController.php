<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Evento;
use App\Imagenevento;

use stdClass;
use DB;
use Storage;

use Image;

class ImageneventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $evento_id=$request->evento_id;

        $imagenevento = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento_id)->get();

          return [
            'imagenevento'=>$imagenevento
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
        $evento_id=$request->evento_id;
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

            $aux='evento-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('eventoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('eventoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('eventoProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('eventoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('eventoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('eventoProgramaEstudio')->delete($imagen);
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

                $imagenEvento = new Imagenevento();
                $imagenEvento->nombre = $nombre;
                $imagenEvento->descripcion = $descripcion;
                $imagenEvento->url = $imagen;
                $imagenEvento->posicion = $posicion;
                $imagenEvento->activo = '1';
                $imagenEvento->borrado = '0';
                $imagenEvento->evento_id = $evento_id;

                $imagenEvento->save();

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
        $evento_id=$request->evento_id;
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

            $aux='evento'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('eventoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('eventoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('eventoProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('eventoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('eventoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('eventoProgramaEstudio')->delete($imagen);
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
                        Storage::disk('eventoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('eventoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('eventoProgramaEstudio')->delete($oldImg);
                    }
                    $evento = Imagenevento::findOrFail($id);
                    $evento->nombre=$nombre;
                    $evento->descripcion=$descripcion;
                    $evento->posicion=$posicion;
                    $evento->url=$imagen;


                    $evento->save();
                }
                else
                {
                    $evento = Imagenevento::findOrFail($id);
                    $evento->nombre=$nombre;
                    $evento->descripcion=$descripcion;
                    $evento->posicion=$posicion;


                    $evento->save();
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

        $evento = Imagenevento::findOrFail($id);
        $eventoPadre = Evento::findOrFail($evento->evento_id);

        if(Strlen($evento->url) > 0){
            
            if(intval($eventoPadre->nivel) == 0){
                Storage::disk('eventoUNASAM')->delete($evento->url);
            }
            elseif(intval($eventoPadre->nivel) == 1){
                Storage::disk('eventoFacultad')->delete($evento->url);
            }
            elseif(intval($eventoPadre->nivel) == 2){
                Storage::disk('eventoProgramaEstudio')->delete($evento->url);
            }
        }
        
        $evento->delete();

        $msj='Imagen eliminada exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
