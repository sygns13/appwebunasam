<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Estatuto;
use App\Documentoestatuto;

use stdClass;
use DB;
use Storage;

class DocumentoestatutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estatuto_id=$request->estatuto_id;

        $documentoEstatuto = Documentoestatuto::where('activo','1')->where('borrado','0')->where('estatuto_id', $estatuto_id)->get();

          return [
            'documentoEstatuto'=>$documentoEstatuto
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
        $estatuto_id=$request->estatuto_id;
        $url=$request->url;
        $activo=1;

     /*    var_dump($estatuto_id); */



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

            $aux='estatuto_mod-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen' => $img) ;
            $reglas = array('imagen' => 'required||mimes:pdf,PDF');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,512000');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado no es un archivo PDF válido, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagenDetalle';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado tiene un tamaño no válido superior a los 50MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenDetalle';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                //$subir=Storage::disk('estatutoFacultad')->put($nuevoNombre, \File::get($img));

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('estatutoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('estatutoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('estatutoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                }

                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir la archivo, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenDetalle';
                }
            }
        }
        else{
            $msj="Debe de adjuntar una archivo pdf válido";
            $segureImg=1;
            $result='0';
            $selector='imagenDetalle';
        }

        if($segureImg==1){

            if(intval($nivel) == 0){
                Storage::disk('estatutoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('estatutoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('estatutoProgramaEstudio')->delete($imagen);
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
                $msj='Debe ingresar el nombre de la modificatoria';
                $selector='txtnombreImg';
            }
            elseif ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la posición de la Modificatoria en formato numérico';
                $selector='txtposicion';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                $documentoEstatuto = new Documentoestatuto();
                $documentoEstatuto->nombre = $nombre;
                $documentoEstatuto->descripcion = $descripcion;
                $documentoEstatuto->url = $imagen;
                $documentoEstatuto->posicion = $posicion;
                $documentoEstatuto->activo = '1';
                $documentoEstatuto->borrado = '0';
                $documentoEstatuto->estatuto_id = $estatuto_id;

                $band=Documentoestatuto::where('activo',1)->where('borrado',0)->where('estatuto_id',$estatuto_id)->where('posicion',$posicion)->exists();
                if ($band==true) {
                    $exi='0';
                    $msj='La posición de la modificatoria ya existe';       
                }else{
                    $exi='1';
                    $documentoEstatuto->save();
                    $msj='Nueva Modificatoria Registrada con Éxito';
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
        $estatuto_id=$request->estatuto_id;
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

            $aux='estatuto_mod'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required||mimes:pdf,PDF');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,512000');
            $validatorF = Validator::make($input2, $reglas2);

            

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado no es un archivo PDF válido, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagenEDetalle';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado tiene un tamaño no válido superior a los 50MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenEDetalle';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;
                //$subir=Storage::disk('estatutoFacultad')->put($nuevoNombre, \File::get($img));

                /* $imgR = Image::make($img);
                $imgR->resize(1500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream(); */

                $subir=false;
                if(intval($nivel) == 0){
                    $subir=Storage::disk('estatutoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('estatutoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('estatutoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
                }

                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir el archivo, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenEDetalle';
                }
            }
        }
        if($segureImg==1){
           // Storage::disk('estatutoFacultad')->delete($imagen);

            if(intval($nivel) == 0){
                Storage::disk('estatutoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('estatutoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('estatutoProgramaEstudio')->delete($imagen);
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
                $msj='Debe ingresar el nombre de la modificatoria';
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
                $band=Documentoestatuto::where('activo',1)->where('borrado',0)->where('estatuto_id',$estatuto_id)->where('posicion',$posicion)->where('id','<>',$id)->exists();
                if ($band==true) {
                    $exi='0';
                    $msj='La posición de la modificatoria ya existe';      
                }else{
                    $exi='1';
                    if(strlen($imagen)>0){
                        //Storage::disk('estatutoFacultad')->delete($oldImg);
                        if(intval($nivel) == 0){
                            Storage::disk('estatutoUNASAM')->delete($oldImg);
                        }elseif(intval($nivel) == 1){
                            Storage::disk('estatutoFacultad')->delete($oldImg);
                        }elseif(intval($nivel) == 2){
                            Storage::disk('estatutoProgramaEstudio')->delete($oldImg);
                        }
                        $estatuto = Documentoestatuto::findOrFail($id);
                        $estatuto->nombre=$nombre;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->posicion=$posicion;
                        $estatuto->url=$imagen;
                        $estatuto->save();
                    }else{
                        $estatuto = Documentoestatuto::findOrFail($id);
                        $estatuto->nombre=$nombre;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->posicion=$posicion;
                        $estatuto->save();
                    }
                    $msj='La Modificatoria del estatuto ha sido modificada con éxito';
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

        $estatuto = Documentoestatuto::findOrFail($id);

        if(Strlen($estatuto->url) > 0){
            //Storage::disk('estatutoFacultad')->delete($estatuto->url);

            if(intval($estatuto->nivel) == 0){
                Storage::disk('estatutoUNASAM')->delete($estatuto->url);
            }
            elseif(intval($estatuto->nivel) == 1){
                Storage::disk('estatutoFacultad')->delete($estatuto->url);
            }
            elseif(intval($estatuto->nivel) == 2){
                Storage::disk('estatutoProgramaEstudio')->delete($estatuto->url);
            }
        }
        
        $estatuto->delete();

        $msj='Modificatoria eliminada exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
    public function numsiguiente($id){
        $idnot=$id;
        $queryZero=Documentoestatuto::where('activo',1)->where('borrado',0)->where('estatuto_id',$idnot)->max('posicion');
        $idban=$queryZero+1;
        return response()->json(["idban"=>$idban]);
    }
}
