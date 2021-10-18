<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Presentacion;

use stdClass;
use DB;
use Storage;

class PresentacionController extends Controller
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

            $modulo="presentacionfacultad";

            return view('adminfacultad.presentacion.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        //$buscar=$request->busca;

        $presentacion=Presentacion::where('borrado','0')
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
        ->where('facultad_id',1)
        ->where('nivel',1)
        ->first();

          return [
            'presentacion'=>$presentacion
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
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
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

                $aux='presentacion_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                    $subir=Storage::disk('presentacionFacultad')->put($nuevoNombre, \File::get($img));
    
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
            Storage::disk('presentacionFacultad')->delete($imagen);
        }
        else{
            $input1  = array('titulo' => $titulo);
            $reglas1 = array('titulo' => 'required');

            $input2  = array('descripcion' => $descripcion);
            $reglas2 = array('descripcion' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el título de la Presentación';
                $selector='txttitulo';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción de la Presentación';
                $selector='txtdescripcion';
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    Storage::disk('presentacionFacultad')->delete($oldImg);
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        Storage::disk('presentacionFacultad')->delete($oldImg);

                        $presentacion = new Presentacion();
                        $presentacion->titulo=$titulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->borrado='0';
                        $presentacion->nivel='1';
                        $presentacion->user_id=Auth::user()->id;
                        $presentacion->facultad_id='1';

                        $presentacion->save();
                    }
                    else
                    {
                        $presentacion = new Presentacion();
                        $presentacion->titulo=$titulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->borrado='0';
                        $presentacion->nivel='1';
                        $presentacion->user_id=Auth::user()->id;
                        $presentacion->facultad_id='1';

                        $presentacion->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        Storage::disk('presentacionFacultad')->delete($oldImg);

                        $presentacion = Presentacion::findOrFail($id);
                        $presentacion->titulo=$titulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->nivel='1';
                        $presentacion->user_id=Auth::user()->id;
                        $presentacion->facultad_id='1';

                        $presentacion->save();
                    }
                    else
                    {
                        $presentacion = Presentacion::findOrFail($id);
                        $presentacion->titulo=$titulo;
                        $presentacion->descripcion=$descripcion;
                        $presentacion->tieneimagen=$tieneimagen;
                        $presentacion->url=$imagen;
                        $presentacion->activo=$activo;
                        $presentacion->nivel='1';
                        $presentacion->user_id=Auth::user()->id;
                        $presentacion->facultad_id='1';

                        $presentacion->save();
                    }
                }
                

                $msj='Presentación Registrada con Éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        Storage::disk('presentacionFacultad')->delete($image);

        $presentacion = Presentacion::findOrFail($id);
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
