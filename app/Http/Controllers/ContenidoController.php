<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Contenido;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;
class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index01()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 22;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="himno";

            return view('paginasportal.contenido1.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
   /*  public function index02()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="vicerrector1";

            return view('paginasportal.contenido2.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index03()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="vicerrector2";

            return view('paginasportal.contenido3.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index04()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="asambleau";

            return view('paginasportal.contenido4.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index05()
    {
        if(accesoUser([1,2,3])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="concejou";

            return view('paginasportal.contenido5.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    } */
    public function index(Request $request)
    {
        //$buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $tipo = $request->tipo;

        $queryZero=Contenido::where('borrado','0');
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

        $contenido = $queryZero->where('tipo',$tipo)->first();

          return [
            'contenido'=>$contenido
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
        $mediaurl=$request->mediaurl;
        $descripcion=$request->descripcion;
        $url=$request->url;
        $tieneimagen=$request->tieneimagen;
        $tipo = $request->tipo;

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

        $oldImg=$request->oldimg;

        if(intval($tieneimagen) == 1){
            if ($request->hasFile('imagen')) { 

                $aux='contenido_gobierno-'.date('d-m-Y').'-'.date('H-i-s');
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

                    //$subir=Storage::disk('contenidoFacultad')->put($nuevoNombre, \File::get($img));

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('contenidoUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('contenidoFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('contenidoProgramaEstudio')->put($nuevoNombre, \File::get($img));
                    // $subir=Storage::disk('banerProgramaEstudio')->put($nuevoNombre, $imgR);
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
                $msj="Debe de adjuntar una imagen del válida";
                $segureImg=1;
                $result='0';
                $selector='imagen';
            }
        }

        

        if($segureImg==1){
            

            if(intval($nivel) == 0){
                Storage::disk('contenidoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('contenidoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('contenidoProgramaEstudio')->delete($imagen);
            }


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
                if($tipo == '1'){
                    $msj='Debe ingresar el nombre del Himno de la UNASAM';
                }
/*                 elseif($tipo == '2'){
                    $msj='Debe ingresar el nombre del Vicerrector Académico';
                }
                elseif($tipo == '3'){
                    $msj='Debe ingresar el nombre del Vicerrector Administrativo';
                }
                elseif($tipo == '4'){
                    $msj='Debe ingresar el nombre de la Asamblea Universitaria';
                }
                elseif($tipo == '5'){
                    $msj='Debe ingresar el nombre del Concejo Universitario';
                }
                elseif($tipo == '6'){
                    $msj='Debe ingresar el nombre del Decano de Facultad';
                }
                elseif($tipo == '7'){
                    $msj='Debe ingresar el nombre del Director de Escuela';
                } */

                
                $selector='txttitulo';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar el contenido del Himno de la UNASAM';
                $selector='txtdescripcion';
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('contenidoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('contenidoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('contenidoProgramaEstudio')->delete($oldImg);
                    }
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($mediaurl == null){
                    $mediaurl = "";
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('contenidoUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('contenidoFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('contenidoProgramaEstudio')->delete($oldImg);
                        }

                        

                        $contenido = new Contenido();
                        $contenido->titulo=$titulo;
                        $contenido->mediaurl=$mediaurl;
                        $contenido->descripcion=$descripcion;
                        $contenido->tieneimagen=$tieneimagen;
                        $contenido->url=$imagen;
                        $contenido->activo=$activo;
                        $contenido->borrado='0';
                        $contenido->tipo=$tipo;
                        $contenido->nivel=$nivel;
                        $contenido->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $contenido->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $contenido->programaestudio_id=$programaestudio_id;
                        }

                        $contenido->save();
                    }
                    else
                    {
                        $contenido = new Contenido();
                        $contenido->titulo=$titulo;
                        $contenido->mediaurl=$mediaurl;
                        $contenido->descripcion=$descripcion;
                        $contenido->tieneimagen=$tieneimagen;
                        $contenido->url=$imagen;
                        $contenido->activo=$activo;
                        $contenido->borrado='0';
                        $contenido->nivel=$nivel;
                        $contenido->tipo=$tipo;
                        $contenido->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $contenido->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $contenido->programaestudio_id=$programaestudio_id;
                        }

                        $contenido->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('contenidoUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('contenidoFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('contenidoProgramaEstudio')->delete($oldImg);
                        }

                        $contenido = Contenido::findOrFail($id);
                        $contenido->titulo=$titulo;
                        $contenido->mediaurl=$mediaurl;
                        $contenido->descripcion=$descripcion;
                        $contenido->tieneimagen=$tieneimagen;
                        $contenido->url=$imagen;
                        $contenido->activo=$activo;
                        $contenido->user_id=Auth::user()->id;

                        $contenido->save();
                    }
                    else
                    {
                        $contenido = Contenido::findOrFail($id);
                        $contenido->titulo=$titulo;
                        $contenido->mediaurl=$mediaurl;
                        $contenido->descripcion=$descripcion;
                        $contenido->tieneimagen=$tieneimagen;
                        $contenido->url=$imagen;
                        $contenido->activo=$activo;
                        $contenido->user_id=Auth::user()->id;

                        $contenido->save();
                    }
                }
                

                

                if($tipo == '1'){
                    $msj='Registro del Himno actualizado con éxito';
                }
/*                 elseif($tipo == '2'){
                    $msj='Registro del Vicerrector Académico actualizado con éxito';
                }
                elseif($tipo == '3'){
                    $msj='Registro del Vicerrector de Investigación actualizado con éxito';
                }
                elseif($tipo == '4'){
                    $msj='Registro de la Asamblea Universitaria actualizado con éxito';
                }
                elseif($tipo == '5'){
                    $msj='Registro del Concejo Universitario actualizado con éxito';
                }
                elseif($tipo == '6'){
                    $msj='Registro del Decano de Facultad actualizado con éxito';
                }
                elseif($tipo == '7'){
                    $msj='Registro del Director de Escuela actualizado con éxito';
                } */

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        $contenido = Contenido::findOrFail($id);

        if(intval($contenido->nivel) == 0){
            Storage::disk('contenidoUNASAM')->delete($contenido->url);
        }
        elseif(intval($contenido->nivel) == 1){
            Storage::disk('contenidoFacultad')->delete($contenido->url);
        }
        elseif(intval($contenido->nivel) == 2){
            Storage::disk('contenidoProgramaEstudio')->delete($contenido->url);
        }


        $contenido->url='';
        $contenido->save();

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
