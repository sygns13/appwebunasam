<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Objetivo;

use stdClass;
use DB;
use Storage;

use Image;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index0()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="objetivosportal";

            return view('paginasportal.objetivos.index',compact('tipouser','modulo'));
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

        $queryZero=Objetivo::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            $query->orWhere('descripcion','like','%'.$buscar.'%');
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

        $objetivos = $queryZero->orderBy('numero')
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $objetivos->total(),
                'current_page'=> $objetivos->currentPage(),
                'per_page'=> $objetivos->perPage(),
                'last_page'=> $objetivos->lastPage(),
                'from'=> $objetivos->firstItem(),
                'to'=> $objetivos->lastItem(),
            ],
            'objetivos'=>$objetivos
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

        $numero=$request->numero;
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
        $tieneimagen=$request->tieneimagen;
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

            $aux='objetivo-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('objetivoUNASAM')->put($nuevoNombre, \File::get($img));
                   //$subir=Storage::disk('objetivoUNASAM')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 1){
                    $subir=Storage::disk('objetivoFacultad')->put($nuevoNombre, \File::get($img));
                  //$subir=Storage::disk('objetivoFacultad')->put($nuevoNombre, $imgR);
                }
                elseif(intval($nivel) == 2){
                      $subir=Storage::disk('objetivoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                   // $subir=Storage::disk('objetivoProgramaEstudio')->put($nuevoNombre, $imgR);
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
                Storage::disk('objetivoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('objetivoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('objetivoProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('numero' => $numero);
            $reglas1 = array('numero' => 'required');

            $input2  = array('titulo' => $titulo);
            $reglas2 = array('titulo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el número del objetivo en formato numérico';
                $selector='txtnumero';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el Objetivo Estratégico';
                $selector='txttitulo';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                $objetivo = new Objetivo();
                $objetivo->numero=$numero;
                $objetivo->titulo=$titulo;
                $objetivo->descripcion=$descripcion;
                $objetivo->url=$imagen;
                $objetivo->activo=$activo;
                $objetivo->borrado='0';
                $objetivo->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $objetivo->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $objetivo->programaestudio_id=$programaestudio_id;
                }
                $objetivo->user_id=Auth::user()->id;

                $objetivo->save();

                $msj='Nuevo Objetivo Registrado con Éxito';

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

        $numero=$request->numero;
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
        $tieneimagen=$request->tieneimagen;
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

            $aux='objetivo'.date('d-m-Y').'-'.date('H-i-s');
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
                   // $subir=Storage::disk('objetivoUNASAM')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('objetivoUNASAM')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 1){
                   // $subir=Storage::disk('objetivoFacultad')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('objetivoFacultad')->put($nuevoNombre, \File::get($img));
                }
                elseif(intval($nivel) == 2){
                   // $subir=Storage::disk('objetivoProgramaEstudio')->put($nuevoNombre, $imgR);
                    $subir=Storage::disk('objetivoProgramaEstudio')->put($nuevoNombre, \File::get($img));
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
                Storage::disk('objetivoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('objetivoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('objetivoProgramaEstudio')->delete($imagen);
            }
        }
        else{
            $input1  = array('numero' => $numero);
            $reglas1 = array('numero' => 'required');

            $input2  = array('titulo' => $titulo);
            $reglas2 = array('titulo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el número del objetivo en formato numérico';
                $selector='txtnumeroE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el Objetivo Estratégico';
                $selector='txttituloE';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                if(strlen($imagen)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('objetivoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('objetivoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('objetivoProgramaEstudio')->delete($oldImg);
                    }


                    $objetivo = Objetivo::findOrFail($id);
                    $objetivo->numero=$numero;
                    $objetivo->titulo=$titulo;
                    $objetivo->descripcion=$descripcion;
                    $objetivo->url=$imagen;
                    $objetivo->activo=$activo;
                    $objetivo->user_id=Auth::user()->id;

                    $objetivo->save();
                }
                else
                {
                    $objetivo = Objetivo::findOrFail($id);
                    $objetivo->numero=$numero;
                    $objetivo->titulo=$titulo;
                    $objetivo->descripcion=$descripcion;
                    $objetivo->activo=$activo;
                    $objetivo->user_id=Auth::user()->id;

                    $objetivo->save();
                }

                $msj='El Objetivo ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }


    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $objetivo = Objetivo::findOrFail($id);
        $objetivo->activo=$estado;
        $objetivo->save();

        if(strval($estado)=="0"){
            $msj='El Objetivo fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Objetivo fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $objetivo = Objetivo::findOrFail($id);

        if(intval($objetivo->nivel) == 0){
            Storage::disk('objetivoUNASAM')->delete($image);
        }
        elseif(intval($objetivo->nivel) == 1){
            Storage::disk('objetivoFacultad')->delete($image);
        }
        elseif(intval($objetivo->nivel) == 2){
            Storage::disk('objetivoProgramaEstudio')->delete($image);
        }


        $objetivo->url='';
        $objetivo->save();

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



        $objetivo = Objetivo::findOrFail($id);

        if(Strlen($objetivo->url) > 0){
            if(intval($objetivo->nivel) == 0){
                Storage::disk('objetivoUNASAM')->delete($objetivo->url);
            }
            elseif(intval($objetivo->nivel) == 1){
                Storage::disk('objetivoFacultad')->delete($objetivo->url);
            }
            elseif(intval($objetivo->nivel) == 2){
                Storage::disk('objetivoProgramaEstudio')->delete($objetivo->url);
            }
        }
        
        //$task->delete();
        $objetivo->borrado='1';
        $objetivo->user_id=Auth::user()->id;
        $objetivo->save();

        $msj='Objetivo eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
