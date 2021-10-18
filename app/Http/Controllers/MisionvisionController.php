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

class MisionvisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="misionvisionfec";

            return view('adminfacultad.misionvision.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index(Request $request)
    {
        //$buscar=$request->busca;

        $mision=Misionvision::where('borrado','0')
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
        ->where('facultad_id',1)
        ->where('nivel',1)
        ->where('tipo',1)
        ->first();

        $vision=Misionvision::where('borrado','0')
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
        ->where('facultad_id',1)
        ->where('nivel',1)
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

        if(intval($tieneimagen) == 1){
            if ($request->hasFile('imagen')) { 

                $aux='misionvision_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('misionvisionFacultad')->put($nuevoNombre, \File::get($img));
    
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
                $msj="Debe de adjuntar una imagen del válida";
                $segureImg=1;
                $result='0';
                $selector='imagen';
            }
        }

        

        if($segureImg==1){
            Storage::disk('misionvisionFacultad')->delete($imagen);
        }
        else{

            $titulo = "";
            if(intval($tipo) == 1){
                $titulo = "MISIÓN DE LA FACULTAD DE ECONOMÍA Y CONTABILIDAD";
            }
            elseif(intval($tipo) == 2){
                $titulo = "VISIÓN DE LA FACULTAD DE ECONOMÍA Y CONTABILIDAD";
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
                    Storage::disk('misionvisionFacultad')->delete($oldImg);
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        Storage::disk('misionvisionFacultad')->delete($oldImg);

                        $misionvision = new Misionvision();
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->borrado='0';
                        $misionvision->nivel='1';
                        $misionvision->user_id=Auth::user()->id;
                        $misionvision->facultad_id='1';

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
                        $misionvision->nivel='1';
                        $misionvision->user_id=Auth::user()->id;
                        $misionvision->facultad_id='1';

                        $misionvision->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        Storage::disk('misionvisionFacultad')->delete($oldImg);

                        $misionvision = Misionvision::findOrFail($id);
                        $misionvision->titulo=$titulo;
                        $misionvision->descripcion=$descripcion;
                        $misionvision->tipo=$tipo;
                        $misionvision->tieneimagen=$tieneimagen;
                        $misionvision->url=$imagen;
                        $misionvision->activo=$activo;
                        $misionvision->nivel='1';
                        $misionvision->user_id=Auth::user()->id;
                        $misionvision->facultad_id='1';

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
                        $misionvision->nivel='1';
                        $misionvision->user_id=Auth::user()->id;
                        $misionvision->facultad_id='1';

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

        Storage::disk('misionvisionFacultad')->delete($image);

        $presentacion = Misionvision::findOrFail($id);
        $presentacion->url='';
        $presentacion->save();

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
