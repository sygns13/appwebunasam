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

use Image;


class EstatutoController extends Controller
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

            $modulo="estatutoportal";

            return view('paginasportal.estatuto.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        //$buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $queryZero=Estatuto::where('borrado','0');
       /* ->where(function($query) use ($buscar){
            $query->where('titulo','like','%'.$buscar.'%');
            //$query->orWhere('users.name','like','%'.$buscar.'%');
            })*/
            if($facultad_id != null && intval($facultad_id) > 0){
                $queryZero->where('facultad_id',$facultad_id);
            }
    
            if($programaestudio_id != null && intval($programaestudio_id) > 0){
                $queryZero->where('programaestudio_id',$programaestudio_id);
            }
    
            if($nivel != null){
                $queryZero->where('nivel',$nivel);
            }
            $estatuto = $queryZero->first();

        if($estatuto != null){
            $documentoEstatuto = Documentoestatuto::where('activo','1')->where('borrado','0')->where('estatuto_id', $estatuto->id)->get();
            $estatuto->documentoEstatuto = $documentoEstatuto;
        }
        

          return [
            'estatuto'=>$estatuto
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
        $tieneimagen=$request->tieneimagen;

        $url=$request->url;
        $tieneimagen=$request->tieneimagen;

        $activo=1;

        $archivo="";
        $file=$request->archivo;
        $segureFile=0;

        $oldFile=$request->oldFile;

        $result='1';
        $msj='';
        $selector='';

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;


        if(intval($tieneimagen) == 1){
            if ($request->hasFile('archivo')) { 

                $aux='estatuto-'.date('d-m-Y').'-'.date('H-i-s');
                $input  = array('archivo' => $file) ;
                $reglas = array('archivo' => 'required||mimes:pdf,PDF');
                $validator = Validator::make($input, $reglas);

                $input2  = array('archivo' => $file) ;
                $reglas2 = array('archivo' => 'required|file:1,512000');
                $validatorF = Validator::make($input2, $reglas2);

                if ($validator->fails())
                {

                $segureFile=1;
                $msj="El archivo ingresado no es un archivo PDF válido, ingrese otro archivo o limpie el formulario ";
                $result='0';
                $selector='archivo';
                }
                elseif($validatorF->fails())
                {

                $segureFile=1;
                $msj="El archivo ingresado tiene un tamaño no válido superior a los 50MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo';
                }

                else
                {
                    //$nombre=$file->getClientOriginalName();
                    $extension=$file->getClientOriginalExtension();
                    $nuevoNombre=$aux.".".$extension;

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('estatutoUNASAM')->put($nuevoNombre, \File::get($file));
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('estatutoFacultad')->put($nuevoNombre, \File::get($file));
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('estatutoProgramaEstudio')->put($nuevoNombre, \File::get($file));
                    }


                    if($subir){
                        $archivo=$nuevoNombre;

                    }
                    else{
                        $msj="Error al subir la archivo, intentelo nuevamente luego";
                        $segureFile=1;
                        $result='0';
                        $selector='archivo';
                    }
                }
            }
            else{
                $msj="Debe de adjuntar una archivo del válida";
                $segureFile=1;
                $result='0';
                $selector='archivo';
            }
        }
        else{
            if($id== null || Strlen($id) == 0){
                $msj="Debe adjuntar un archivo correspondiente al estatuto";
                $segureFile=1;
                $result='0';
                $selector='archivo';
            }
        }



        if($segureFile==1){
            
            if(intval($nivel) == 0){
                Storage::disk('estatutoUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('estatutoFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('estatutoProgramaEstudio')->delete($archivo);
            }


        }
        else{

            $input1  = array('titulo' => $titulo);
            $reglas1 = array('titulo' => 'required');

            $validator1 = Validator::make($input1, $reglas1);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el título del Estatuto';
                $selector='txttitulo';
            }
            else{

                if(Strlen($oldFile) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('estatutoUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('estatutoFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('estatutoProgramaEstudio')->delete($oldFile);
                    }
                }
                if( intval($tieneimagen) == 1 && strlen($archivo)==0){
                    $archivo = $url;
                }

                if($descripcion == null){
                    $descripcion = "";
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($archivo)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('estatutoUNASAM')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('estatutoFacultad')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('estatutoProgramaEstudio')->delete($oldFile);
                        }

                        

                        $estatuto = new Estatuto();
                        $estatuto->titulo=$titulo;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->tieneimagen=$tieneimagen;
                        $estatuto->url=$archivo;
                        $estatuto->activo=$activo;
                        $estatuto->borrado='0';
                        $estatuto->nivel=$nivel;
                        $estatuto->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $estatuto->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $estatuto->programaestudio_id=$programaestudio_id;
                        }

                        $estatuto->save();
                    }
                    else
                    {
                        $estatuto = new Estatuto();
                        $estatuto->titulo=$titulo;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->tieneimagen=$tieneimagen;
                        $estatuto->url=$archivo;
                        $estatuto->activo=$activo;
                        $estatuto->borrado='0';
                        $estatuto->nivel=$nivel;
                        $estatuto->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $estatuto->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $estatuto->programaestudio_id=$programaestudio_id;
                        }

                        $estatuto->save();
                    }
                }
                else{
                    if(strlen($archivo)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('estatutoUNASAM')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('estatutoFacultad')->delete($oldFile);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('estatutoProgramaEstudio')->delete($oldFile);
                        }

                        $estatuto = Estatuto::findOrFail($id);
                        $estatuto->titulo=$titulo;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->tieneimagen=$tieneimagen;
                        $estatuto->url=$archivo;
                        $estatuto->activo=$activo;
                        $estatuto->user_id=Auth::user()->id;

                        $estatuto->save();
                    }
                    else
                    {
                        $estatuto = Estatuto::findOrFail($id);
                        $estatuto->titulo=$titulo;
                        $estatuto->descripcion=$descripcion;
                        $estatuto->tieneimagen=$tieneimagen;
                        $estatuto->activo=$activo;
                        $estatuto->user_id=Auth::user()->id;

                        $estatuto->save();
                    }
                }


                

                $msj='Estatuto Registrada con Éxito';

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
