<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Documento;

use stdClass;
use DB;
use Storage;


class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index01()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="documentoportal";

            return view('paginasportal.documento.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index02()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="informeportal";

            return view('paginasportal.informe.index',compact('tipouser','modulo'));
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

        $tipo=$request->tipo;

        $queryZero=Documento::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
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

        $documentos = $queryZero->where('tipo',$tipo)
        ->orderBy('numero')
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $documentos->total(),
                'current_page'=> $documentos->currentPage(),
                'per_page'=> $documentos->perPage(),
                'last_page'=> $documentos->lastPage(),
                'from'=> $documentos->firstItem(),
                'to'=> $documentos->lastItem(),
            ],
            'documentos'=>$documentos
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
        $url=$request->url;
        $tipo=$request->tipo;
        $numero=$request->numero;
        $fecha=$request->fecha;
        $descripcion=$request->descripcion;
        $activo=$request->activo;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $result='1';
        $msj='';
        $selector='';


        if($request->hasFile('archivo')){

            $nombreArchivo=$request->nombrefile;

            $aux2='documento_'.date('d-m-Y').'-'.date('H-i-s');
            $input2  = array('archivo' => $file) ;
            $reglas2 = array('archivo' => 'required|file:1,1024000');
            $validatorF = Validator::make($input2, $reglas2);     

            if ($validatorF->fails())
            {
                $segureFile=1;
                $msj="El archivo adjunto ingresado tiene un tamaño superior a 100 MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivo';
            }
            else
            {
                $nombre2=$file->getClientOriginalName();
                $extension2=$file->getClientOriginalExtension();
                $nuevoNombre2=$aux2.".".$extension2;
                //$subir2=Storage::disk('infoFile')->put($nuevoNombre2, \File::get($file));

                if($extension2=="pdf" || $extension2=="doc" || $extension2=="docx" || $extension2=="xls" || $extension2=="xlsx" || $extension2=="ppt" || $extension2=="pptx" || $extension2=="PDF" || $extension2=="DOC" || $extension2=="DOCX" || $extension2=="XLS" || $extension2=="XLSX" || $extension2=="PPT" || $extension2=="PTTX")
                {

                    $subir2=false;
                    if(intval($nivel) == 0){
                        $subir2=Storage::disk('documentoUNASAM')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('documentoUNASAM')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir2=Storage::disk('documentoFacultad')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('documentoFacultad')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir2=Storage::disk('documentoProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                    // $subir2=Storage::disk('documentoProgramaEstudio')->put($nuevoNombre2, $imgR);
                    }

                if($subir2){
                    $archivo=$nuevoNombre2;
                }
                else{
                    $msj="Error al subir el archivo adjunto, intentelo nuevamente luego";
                    $segureFile=1;
                    $result='0';
                    $selector='archivo';
                }
                }
                else {
                    $segureFile=1;
                    $msj="El archivo adjunto ingresado tiene una extensión no válida, ingrese otro archivo o limpie el formulario";
                    $result='0';
                    $selector='archivo';
                }
            }

        }
        else{
            $msj="Debe de adjuntar un archivo adjunto válido, ingrese un archivo";
            $segureFile=1;
            $result='0';
            $selector='archivo';
        }        

        if($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('documentoUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('documentoFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('documentoProgramaEstudio')->delete($archivo);
            }
        }
        else{

            $input2  = array('nombre' => $nombre);
            $reglas2 = array('nombre' => 'required');

            $input3  = array('numero' => $numero);
            $reglas3 = array('numero' => 'required');

            $input4  = array('fecha' => $fecha);
            $reglas4 = array('fecha' => 'required');

            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator2->fails())
            {
                $result='0';
                if(intval($tipo) == 1){
                    $msj='Debe ingresar el Nombre del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar el Nombre del Informe o Publicación';
                }
                $selector='txtnombre';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                
                if(intval($tipo) == 1){
                    $msj='Debe ingresar el Número de Posición de Publicación del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar el Número de Posición de Publicación del Informe o Publicación';
                }
                $selector='txtnumero';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                
                if(intval($tipo) == 1){
                    $msj='Debe ingresar la fecha del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar la fecha del Informe o Publicación';
                }
                $selector='txtfecha';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }

                $documento = new Documento();
                $documento->nombre=$nombre;
                $documento->url=$archivo;
                $documento->tipo=$tipo;
                $documento->numero=$numero;
                $documento->fecha=$fecha;
                $documento->descripcion=$descripcion;
                $documento->activo=$activo;
                $documento->borrado='0';
                $documento->nivel=$nivel;
                if($facultad_id != null && intval($facultad_id) > 0){
                    $documento->facultad_id=$facultad_id;
                }
                if($programaestudio_id != null && intval($programaestudio_id) > 0){
                    $documento->programaestudio_id=$programaestudio_id;
                }
                $documento->user_id=Auth::user()->id;

                $documento->save();



                if(intval($tipo) == 1){
                    $msj='Nuevo Documento Guardado con Éxito';
                }
                elseif(intval($tipo) == 2){
                    $msj='Nuevo Informe o Publicación Guardado con Éxito';
                }

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

        $nombre=$request->nombre;
        $url=$request->url;
        $tipo=$request->tipo;
        $numero=$request->numero;
        $fecha=$request->fecha;
        $descripcion=$request->descripcion;
        $activo=$request->activo;

        $archivo="";
        $file = $request->archivo;
        $segureFile=0;

        $oldFile=$request->oldfile;

        $nivel=$request->v1;

        $result='1';
        $msj='';
        $selector='';


        if($request->hasFile('archivo')){

            $nombreArchivo=$request->nombrefile;

            $aux2='documento_'.date('d-m-Y').'-'.date('H-i-s');
            $input2  = array('archivo' => $file) ;
            $reglas2 = array('archivo' => 'required|file:1,1024000');
            $validatorF = Validator::make($input2, $reglas2);     

            if ($validatorF->fails())
            {
                $segureFile=1;
                $msj="El archivo adjunto ingresado tiene un tamaño superior a 100 MB, ingrese otro archivo o limpie el formulario";
                $result='0';
                $selector='archivoE';
            }
            else
            {
                $nombre2=$file->getClientOriginalName();
                $extension2=$file->getClientOriginalExtension();
                $nuevoNombre2=$aux2.".".$extension2;
                //$subir2=Storage::disk('infoFile')->put($nuevoNombre2, \File::get($file));

                if($extension2=="pdf" || $extension2=="doc" || $extension2=="docx" || $extension2=="xls" || $extension2=="xlsx" || $extension2=="ppt" || $extension2=="pptx" || $extension2=="PDF" || $extension2=="DOC" || $extension2=="DOCX" || $extension2=="XLS" || $extension2=="XLSX" || $extension2=="PPT" || $extension2=="PTTX")
                {

                    $subir2=false;
                    if(intval($nivel) == 0){
                        $subir2=Storage::disk('documentoUNASAM')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('documentoUNASAM')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir2=Storage::disk('documentoFacultad')->put($nuevoNombre2, \File::get($file));
                    //$subir2=Storage::disk('documentoFacultad')->put($nuevoNombre2, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir2=Storage::disk('documentoProgramaEstudio')->put($nuevoNombre2, \File::get($file));
                    // $subir2=Storage::disk('documentoProgramaEstudio')->put($nuevoNombre2, $imgR);
                    }

                if($subir2){
                    $archivo=$nuevoNombre2;
                }
                else{
                    $msj="Error al subir el archivo adjunto, intentelo nuevamente luego";
                    $segureFile=1;
                    $result='0';
                    $selector='archivoE';
                }
                }
                else {
                    $segureFile=1;
                    $msj="El archivo adjunto ingresado tiene una extensión no válida, ingrese otro archivo o limpie el formulario";
                    $result='0';
                    $selector='archivoE';
                }
            }

        }     

        if($segureFile==1){

            if(intval($nivel) == 0){
                Storage::disk('documentoUNASAM')->delete($archivo);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('documentoFacultad')->delete($archivo);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('documentoProgramaEstudio')->delete($archivo);
            }
        }
        else{

            $input2  = array('nombre' => $nombre);
            $reglas2 = array('nombre' => 'required');

            $input3  = array('numero' => $numero);
            $reglas3 = array('numero' => 'required');

            $input4  = array('fecha' => $fecha);
            $reglas4 = array('fecha' => 'required');

            $validator2 = Validator::make($input2, $reglas2);
            $validator3 = Validator::make($input3, $reglas3);
            $validator4 = Validator::make($input4, $reglas4);

            if ($validator2->fails())
            {
                $result='0';
                if(intval($tipo) == 1){
                    $msj='Debe ingresar el Nombre del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar el Nombre del Informe o Publicación';
                }
                $selector='txtnombreE';
            }
            elseif ($validator3->fails())
            {
                $result='0';
                
                if(intval($tipo) == 1){
                    $msj='Debe ingresar el Número de Posición de Publicación del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar el Número de Posición de Publicación del Informe o Publicación';
                }
                $selector='txtnumeroE';
            }
            elseif ($validator4->fails())
            {
                $result='0';
                
                if(intval($tipo) == 1){
                    $msj='Debe ingresar la fecha del Documento';
                }
                elseif(intval($tipo) == 2){
                    $msj='Debe ingresar la fecha del Informe o Publicación';
                }
                $selector='txtfechaE';
            }
            else{

                if($descripcion == null || Strlen($descripcion) == 0){
                    $descripcion = "";
                }


                if(strlen($archivo)>0)
                {

                    if(intval($nivel) == 0){
                        Storage::disk('documentoUNASAM')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('documentoFacultad')->delete($oldFile);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('documentoProgramaEstudio')->delete($oldFile);
                    }


                    $documento = Documento::findOrFail($id);
                    $documento->nombre=$nombre;
                    $documento->url=$archivo;
                    $documento->numero=$numero;
                    $documento->fecha=$fecha;
                    $documento->descripcion=$descripcion;
                    $documento->activo=$activo;
                    $documento->user_id=Auth::user()->id;

                    $documento->save();
                }
                else
                {
                    $documento = Documento::findOrFail($id);
                    $documento->nombre=$nombre;
                    $documento->numero=$numero;
                    $documento->fecha=$fecha;
                    $documento->descripcion=$descripcion;
                    $documento->activo=$activo;
                    $documento->user_id=Auth::user()->id;

                    $documento->save();
                }

                

                if(intval($tipo) == 1){
                    $msj='Documento Modificado con Éxito';
                }
                elseif(intval($tipo) == 2){
                    $msj='Informe o Publicación Modificado con Éxito';
                }

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $documento = Documento::findOrFail($id);
        $documento->activo=$estado;
        $documento->save();

        if(strval($estado)=="0"){
            
            if(intval($documento->tipo) == 1){
                $msj='El Documento fue Desactivado exitosamente';
            }
            elseif(intval($documento->tipo) == 2){
                $msj='El Informe o Publicación fue Desactivado exitosamente';
            }
        }elseif(strval($estado)=="1"){
            
            if(intval($documento->tipo) == 1){
                $msj='El Documento fue Activado exitosamente';
            }
            elseif(intval($documento->tipo) == 2){
                $msj='El Informe o Publicación fue Activado exitosamente';
            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteFile($id)
    {
        $result='1';
        $msj='';
        $selector='';
   
        $documento = Documento::findOrFail($id);

        if(intval($documento->nivel) == 0){
            Storage::disk('documentoUNASAM')->delete($documento->url);
        }
        elseif(intval($documento->nivel) == 1){
            Storage::disk('documentoFacultad')->delete($documento->url);
        }
        elseif(intval($documento->nivel) == 2){
            Storage::disk('documentoProgramaEstudio')->delete($documento->url);
        }


        $documento->url='';
        $documento->save();

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
        
        $documento = Documento::findOrFail($id);

        if(Strlen($documento->url) > 0){
            if(intval($documento->nivel) == 0){
                Storage::disk('documentoUNASAM')->delete($documento->url);
            }
            elseif(intval($documento->nivel) == 1){
                Storage::disk('documentoFacultad')->delete($documento->url);
            }
            elseif(intval($documento->nivel) == 2){
                Storage::disk('documentoProgramaEstudio')->delete($documento->url);
            }
        }
        
        //$task->delete();
        $documento->borrado='1';
        $documento->user_id=Auth::user()->id;
        $documento->save();

        $msj='Registro eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
