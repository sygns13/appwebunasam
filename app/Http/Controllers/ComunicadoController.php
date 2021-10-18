<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Comunicado;
use App\Imagencomunicado;

use stdClass;
use DB;
use Storage;

class ComunicadoController extends Controller
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

            $modulo="comunicadofacultad";

            return view('adminfacultad.comunicado.index',compact('tipouser','modulo','fecha'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index(Request $request)
    {
        $buscar=$request->busca;

        $comunicados = Comunicado::where('borrado','0')
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

        foreach ($comunicados as $key => $dato) {
        
            $imagencomunicado = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $dato->id)->get();
            //$alumnos[$key]->cursosriesgo = $cursos;
            $dato->imagencomunicado = $imagencomunicado;
        }

          return [
            'pagination'=>[
                'total'=> $comunicados->total(),
                'current_page'=> $comunicados->currentPage(),
                'per_page'=> $comunicados->perPage(),
                'last_page'=> $comunicados->lastPage(),
                'from'=> $comunicados->firstItem(),
                'to'=> $comunicados->lastItem(),
            ],
            'comunicados'=>$comunicados
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

            $aux='comunicado_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                $subir=Storage::disk('comunicadoFacultad')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('comunicadoFacultad')->delete($imagen);
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
                $msj='Debe ingresar la fecha del Comunicado';
                $selector='txtfecha';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora del Comunicado';
                $selector='txthora';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titulo del Comunicado';
                $selector='txttitulo';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo del Comunicado';
                $selector='editor1';
            }
            else{


                $comunicado = new Comunicado();

                $comunicado->fecha = $fecha;
                $comunicado->hora = $hora;
                //$comunicado->url = $imagen;
                $comunicado->titulo = $titulo;
                $comunicado->desarrollo = $desarrollo;
                $comunicado->tieneimagen = $tieneimagen;
                $comunicado->activo = $activo;
                $comunicado->borrado = '0';
                $comunicado->nivel = '1';
                $comunicado->user_id = Auth::user()->id;
                $comunicado->facultad_id = '1';

                $comunicado->save();

                $imagencomunicado = new Imagencomunicado();
                $imagencomunicado->nombre = $titulo;
                $imagencomunicado->descripcion = $desarrollo;
                $imagencomunicado->url = $imagen;
                $imagencomunicado->posicion = 0;
                $imagencomunicado->activo = '1';
                $imagencomunicado->borrado = '0';
                $imagencomunicado->comunicado_id = $comunicado->id;

                $imagencomunicado->save();

                $msj='Nuevo comunicado Registrada con Éxito';

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

            $aux='comunicado_fec-'.date('d-m-Y').'-'.date('H-i-s');
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
                $subir=Storage::disk('comunicadoFacultad')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('comunicadoFacultad')->delete($imagen);
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
                $msj='Debe ingresar la fecha del Comunicado';
                $selector='txtfechaE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la hora del Comunicado';
                $selector='txthoraE';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                $msj='Debe ingresar el titulo del Comunicado';
                $selector='txttituloE';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                $msj='Debe ingresar el Desarrollo del Comunicado';
                $selector='editor2';
            }
            else{


                $comunicado = Comunicado::findOrFail($id);

                $comunicado->fecha = $fecha;
                $comunicado->hora = $hora;
                $comunicado->titulo = $titulo;
                $comunicado->desarrollo = $desarrollo;
                $comunicado->activo = $activo;
               
                $comunicado->save();

                if(strlen($imagen)>0)
                {
                    Storage::disk('comunicadoFacultad')->delete($oldImg);

                    $imagenEvt = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $comunicado->id)->where('posicion',0)->first();

                    if($imagenEvt != null && $imagenEvt->id != null){

                        $imagencomunicado = Imagencomunicado::findOrFail($imagenEvt->id);
                        $imagencomunicado->nombre = $titulo;
                        $imagencomunicado->descripcion = $desarrollo;
                        $imagencomunicado->url = $imagen;

                        $imagencomunicado->save();
                    } 
                    else{
                        $imagencomunicado = new Imagencomunicado();

                        $imagencomunicado->nombre = $titulo;
                        $imagencomunicado->descripcion = $desarrollo;
                        $imagencomunicado->url = $imagen;
                        $imagencomunicado->posicion = 0;
                        $imagencomunicado->activo = '1';
                        $imagencomunicado->borrado = '0';
                        $imagencomunicado->comunicado_id = $comunicado->id;

                        $imagencomunicado->save();
                    }
                }
                else{

                    $imagenEvt = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $comunicado->id)->where('posicion',0)->first();
                    if($imagenEvt != null && $imagenEvt->id != null){

                        $imagencomunicado = Imagencomunicado::findOrFail($imagenEvt->id);
                        $imagencomunicado->nombre = $titulo;
                        $imagencomunicado->descripcion = $desarrollo;

                        $imagencomunicado->save();
                    } 
                }

                $msj='El Comunicado ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        Storage::disk('comunicadoFacultad')->delete($image);

        $imagencomunicado = Imagencomunicado::findOrFail($id);
        $imagencomunicado->delete();

        $msj='Se eliminó la imagen exitosamente';

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $comunicado = Comunicado::findOrFail($id);
        $comunicado->activo=$estado;
        $comunicado->save();

        if(strval($estado)=="0"){
            $msj='El Comunicado fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Comunicado fue Activado exitosamente';
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

        $comunicado = Comunicado::findOrFail($id);
        $imagenescomunicado = Imagencomunicado::where('comunicado_id', $comunicado->id)->get();

        foreach ($imagenescomunicado as $key => $dato) {
            $imagen = Imagencomunicado::findOrFail($dato->id);
            Storage::disk('comunicadoFacultad')->delete($imagen->url);
            $imagen->delete();
        }
        
        //$task->delete();
        $comunicado->borrado='1';
        $comunicado->user_id=Auth::user()->id;
        $comunicado->save();

        $msj='Comunicado eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
