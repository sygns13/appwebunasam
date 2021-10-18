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

class EventoController extends Controller
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

            $fecha=date("Y-m-d");

            $modulo="eventofacultad";

            return view('adminfacultad.evento.index',compact('tipouser','modulo','fecha'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index(Request $request)
    {
        $buscar=$request->busca;

        $eventos=Evento::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            $query->orWhere('desarrollo','like','%'.$buscar.'%');
            })
        ->where('facultad_id',1)
        ->where('nivel',1)
        ->orderBy('fecha','desc')
        ->orderBy('hora','desc')
        ->orderBy('id')
        ->paginate(10);

        foreach ($eventos as $key => $dato) {
        
            $imagenevento = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $dato->id)->get();
            //$alumnos[$key]->cursosriesgo = $cursos;
            $dato->imagenevento = $imagenevento;
        }

          return [
            'pagination'=>[
                'total'=> $eventos->total(),
                'current_page'=> $eventos->currentPage(),
                'per_page'=> $eventos->perPage(),
                'last_page'=> $eventos->lastPage(),
                'from'=> $eventos->firstItem(),
                'to'=> $eventos->lastItem(),
            ],
            'eventos'=>$eventos
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
        $titulo = $request->titulo;
        $desarrollo = $request->desarrollo;
        $activo=$request->activo;

        $tieneimagen = 1;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        if ($request->hasFile('imagen')) { 

            $aux='evento_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                $subir=Storage::disk('eventoFacultad')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('eventoFacultad')->delete($imagen);
        }
        else{
            $input1  = array('fecha' => $fecha);
            $reglas1 = array('fecha' => 'required');

            $input2  = array('hora' => $hora);
            $reglas2 = array('hora' => 'required');

            $input3  = array('titulo' => $titulo);
            $reglas3 = array('titulo' => 'required');

            $input4  = array('desarrollo' => $desarrollo);
            $reglas4 = array('desarrollo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la fecha del Evento';
                $selector='txtfecha';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora del Evento';
                $selector='txthora';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titulo del Evento';
                $selector='txttitulo';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo del Evento';
                $selector='editor1';
            }
            else{


                $evento = new Evento();

                $evento->fecha = $fecha;
                $evento->hora = $hora;
                //$evento->url = $imagen;
                $evento->titulo = $titulo;
                $evento->desarrollo = $desarrollo;
                $evento->tieneimagen = $tieneimagen;
                $evento->activo = $activo;
                $evento->borrado = '0';
                $evento->nivel = '1';
                $evento->user_id = Auth::user()->id;
                $evento->facultad_id = '1';

                $evento->save();

                $imagenevento = new Imagenevento();
                $imagenevento->nombre = $titulo;
                $imagenevento->descripcion = $desarrollo;
                $imagenevento->url = $imagen;
                $imagenevento->posicion = 0;
                $imagenevento->activo = '1';
                $imagenevento->borrado = '0';
                $imagenevento->evento_id = $evento->id;

                $imagenevento->save();

                $msj='Nuevo Evento Registrada con Éxito';

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
        $titulo = $request->titulo;
        $desarrollo = $request->desarrollo;
        $activo=$request->activo;

        $tieneimagen = 1;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $oldImg=$request->oldimg;

        if ($request->hasFile('imagen')) { 

            $aux='evento_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                $subir=Storage::disk('eventoFacultad')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('eventoFacultad')->delete($imagen);
        }
        else{
            $input1  = array('fecha' => $fecha);
            $reglas1 = array('fecha' => 'required');

            $input2  = array('hora' => $hora);
            $reglas2 = array('hora' => 'required');

            $input3  = array('titulo' => $titulo);
            $reglas3 = array('titulo' => 'required');

            $input4  = array('desarrollo' => $desarrollo);
            $reglas4 = array('desarrollo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar la fecha del Evento';
                $selector='txtfechaE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora del Evento';
                $selector='txthoraE';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titulo del Evento';
                $selector='txttituloE';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo del Evento';
                $selector='editor2';
            }
            else{


                $evento = Evento::findOrFail($id);

                $evento->fecha = $fecha;
                $evento->hora = $hora;
                $evento->titulo = $titulo;
                $evento->desarrollo = $desarrollo;
                $evento->activo = $activo;
               
                $evento->save();

                if(strlen($imagen)>0)
                {
                    Storage::disk('eventoFacultad')->delete($oldImg);

                    $imagenEvt = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento->id)->where('posicion',0)->first();

                    if($imagenEvt != null && $imagenEvt->id != null){

                        $imagenevento = Imagenevento::findOrFail($imagenEvt->id);
                        $imagenevento->nombre = $titulo;
                        $imagenevento->descripcion = $desarrollo;
                        $imagenevento->url = $imagen;

                        $imagenevento->save();
                    } 
                    else{
                        $imagenevento = new Imagenevento();

                        $imagenevento->nombre = $titulo;
                        $imagenevento->descripcion = $desarrollo;
                        $imagenevento->url = $imagen;
                        $imagenevento->posicion = 0;
                        $imagenevento->activo = '1';
                        $imagenevento->borrado = '0';
                        $imagenevento->evento_id = $evento->id;

                        $imagenevento->save();
                    }
                }
                else{

                    $imagenEvt = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento->id)->where('posicion',0)->first();
                    if($imagenEvt != null && $imagenEvt->id != null){

                        $imagenevento = Imagenevento::findOrFail($imagenEvt->id);
                        $imagenevento->nombre = $titulo;
                        $imagenevento->descripcion = $desarrollo;

                        $imagenevento->save();
                    } 
                }

                $msj='El evento ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        Storage::disk('eventoFacultad')->delete($image);

        $imagenevento = Imagenevento::findOrFail($id);
        $imagenevento->delete();

        $msj='Se eliminó la imagen exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $evento = Evento::findOrFail($id);
        $evento->activo=$estado;
        $evento->save();

        if(strval($estado)=="0"){
            $msj='El evento fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El evento fue Activado exitosamente';
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

        $evento = Evento::findOrFail($id);
        $imagenesevento = Imagenevento::where('evento_id', $evento->id)->get();

        foreach ($imagenesevento as $key => $dato) {
            $imagen = Imagenevento::findOrFail($dato->id);
            Storage::disk('eventoFacultad')->delete($imagen->url);
            $imagen->delete();
        }
        
        //$task->delete();
        $evento->borrado='1';
        $evento->user_id=Auth::user()->id;
        $evento->save();

        $msj='Evento eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
