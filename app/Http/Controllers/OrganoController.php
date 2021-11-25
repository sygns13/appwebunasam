<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Organo;

use stdClass;
use DB;
use Storage;

use Image;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Facultad;
use App\Programaestudio;

class OrganoController extends Controller
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
        $submodulo = 13;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="rector";

            return view('paginasportal.organo1.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index02()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 14;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="vicerrector1";

            return view('paginasportal.organo2.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index03()
    {
        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 15;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="vicerrector2";

            return view('paginasportal.organo3.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index04()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 16;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="asambleau";

            return view('paginasportal.organo4.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }
    public function index05()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 0;
        $modulo = 2;
        $submodulo = 17;

        if(accesoUser([1,2]) || (accesoUser([3]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);

            $modulo="concejou";

            return view('paginasportal.organo5.index',compact('tipouser','modulo','permisos','rolModulos','rolSubModulos'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index06()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 1;
        $modulo = 5;
        $submodulo = 41;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $facultads = [];

            $modulo="decano";

            if(accesoUser([1,2])){
                $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $facultad = Facultad::find($dato->facultad_id);
                        array_push($facultads, $facultad);
                    } 
                }
            }

            return view('paginasfacultad.organo6.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
        }
        else
        {
            return redirect('home');    
        }

    }

    public function index07()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 1;
        $modulo = 5;
        $submodulo = 42;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $facultads = [];

            $modulo="consejofacultad";

            if(accesoUser([1,2])){
                $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $facultad = Facultad::find($dato->facultad_id);
                        array_push($facultads, $facultad);
                    } 
                }
            }

            return view('paginasfacultad.organo7.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads'));
        }
        else
        {
            return redirect('home');    
        }

    }

    public function index08()
    {

        $permisos=Permiso::where('user_id',Auth::user()->id)->get();
        $rolModulos=Rolmodulo::where('user_id',Auth::user()->id)->get();
        $rolSubModulos=Rolsubmodulo::where('user_id',Auth::user()->id)->get();

        $nivel = 1;
        $modulo = 5;
        $submodulo = 43;

        if(accesoUser([1,2]) || (accesoUser([3,4]) && accesoModulo($permisos, $rolModulos, $rolSubModulos, $nivel, $modulo, $submodulo))){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);
            $facultads = [];

            $modulo="directores";

            if(accesoUser([1,2])){
                $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            }
            else{
                foreach ($permisos as $key => $dato) {
                    if($dato->nivel == $nivel){
                        $facultad = Facultad::find($dato->facultad_id);
                        array_push($facultads, $facultad);
                    } 
                }
            }

            $programaestudios = Programaestudio::orderBy('id')->where('borrado','0')->get();

            return view('paginasfacultad.organo8.index',compact('tipouser','modulo', 'permisos','rolModulos','rolSubModulos','facultads','programaestudios'));
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

        $tipo = $request->tipo;

        $queryZero=Organo::where('borrado','0');
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

        $organo = $queryZero->where('tipo',$tipo)->first();

          return [
            'organo'=>$organo
            ];
    }


    public function index1(Request $request)
    {
        //$buscar=$request->busca;
        $nivel=$request->v1;
        $facultad_id=$request->v2;
        $programaestudio_id=$request->v3;

        $tipo = $request->tipo;

        $queryZero=Organo::where('borrado','0');
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

        $organo = $queryZero->where('tipo',$tipo)->get();

          return [
            'organo'=>$organo
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
        $subtitulo=$request->subtitulo;
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

                $aux='organo_gobierno-'.date('d-m-Y').'-'.date('H-i-s');
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

                    //$subir=Storage::disk('organoFacultad')->put($nuevoNombre, \File::get($img));

                    $subir=false;
                    if(intval($nivel) == 0){
                        $subir=Storage::disk('organoUNASAM')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerUNASAM')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 1){
                        $subir=Storage::disk('organoFacultad')->put($nuevoNombre, \File::get($img));
                    //$subir=Storage::disk('banerFacultad')->put($nuevoNombre, $imgR);
                    }
                    elseif(intval($nivel) == 2){
                        $subir=Storage::disk('organoProgramaEstudio')->put($nuevoNombre, \File::get($img));
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

                if($oldImg != null && $oldImg != ""){
                    $imagen=$oldImg;
                }
                else{
                    $msj="Debe ingresar una imagen";
                    $segureImg=1;
                    $result='0';
                    $selector='imagen';
                }
            }
        }

        

        if($segureImg==1){
            

            if(intval($nivel) == 0){
                Storage::disk('organoUNASAM')->delete($imagen);
            }
            elseif(intval($nivel) == 1){
                Storage::disk('organoFacultad')->delete($imagen);
            }
            elseif(intval($nivel) == 2){
                Storage::disk('organoProgramaEstudio')->delete($imagen);
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
                    $msj='Debe ingresar el nombre del Rector';
                }
                elseif($tipo == '2'){
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
                    $msj='Debe ingresar el nombre del Consejo de Facultad';
                }
                elseif($tipo == '8'){
                    $msj='Debe ingresar el nombre del Director de Escuela';
                }
                elseif($tipo == '9'){
                    $msj='Debe ingresar el nombre del jefe de Departamento';
                }

                
                $selector='txttitulo';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la descripción del órgano de Gobierno';
                $selector='txtdescripcion';
            }
            else{

                if(Strlen($oldImg) > 0 && intval($tieneimagen) == 0){
                    if(intval($nivel) == 0){
                        Storage::disk('organoUNASAM')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 1){
                        Storage::disk('organoFacultad')->delete($oldImg);
                    }
                    elseif(intval($nivel) == 2){
                        Storage::disk('organoProgramaEstudio')->delete($oldImg);
                    }
                }
                if( intval($tieneimagen) == 1 && strlen($imagen)==0){
                    $imagen = $url;
                }

                if($subtitulo == null){
                    $subtitulo = "";
                }

                if($id== null || Strlen($id) == 0){
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0){
                            Storage::disk('organoUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('organoFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('organoProgramaEstudio')->delete($oldImg);
                        }

                        

                        $organo = new Organo();
                        $organo->titulo=$titulo;
                        $organo->subtitulo=$subtitulo;
                        $organo->descripcion=$descripcion;
                        $organo->tieneimagen=$tieneimagen;
                        $organo->url=$imagen;
                        $organo->activo=$activo;
                        $organo->borrado='0';
                        $organo->tipo=$tipo;
                        $organo->nivel=$nivel;
                        $organo->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $organo->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $organo->programaestudio_id=$programaestudio_id;
                        }

                        $organo->save();
                    }
                    else
                    {
                        $organo = new Organo();
                        $organo->titulo=$titulo;
                        $organo->subtitulo=$subtitulo;
                        $organo->descripcion=$descripcion;
                        $organo->tieneimagen=$tieneimagen;
                        $organo->url=$imagen;
                        $organo->activo=$activo;
                        $organo->borrado='0';
                        $organo->nivel=$nivel;
                        $organo->tipo=$tipo;
                        $organo->user_id=Auth::user()->id;
                        if($facultad_id != null && intval($facultad_id) > 0){
                            $organo->facultad_id=$facultad_id;
                        }
                        if($programaestudio_id != null && intval($programaestudio_id) > 0){
                            $organo->programaestudio_id=$programaestudio_id;
                        }

                        $organo->save();
                    }
                }
                else{
                    if(strlen($imagen)>0)
                    {
                        if(intval($nivel) == 0 && $oldImg != $imagen){
                            Storage::disk('organoUNASAM')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 1){
                            Storage::disk('organoFacultad')->delete($oldImg);
                        }
                        elseif(intval($nivel) == 2){
                            Storage::disk('organoProgramaEstudio')->delete($oldImg);
                        }

                        $organo = Organo::findOrFail($id);
                        $organo->titulo=$titulo;
                        $organo->subtitulo=$subtitulo;
                        $organo->descripcion=$descripcion;
                        $organo->tieneimagen=$tieneimagen;
                        $organo->url=$imagen;
                        $organo->activo=$activo;
                        $organo->user_id=Auth::user()->id;

                        $organo->save();
                    }
                    else
                    {
                        $organo = Organo::findOrFail($id);
                        $organo->titulo=$titulo;
                        $organo->subtitulo=$subtitulo;
                        $organo->descripcion=$descripcion;
                        $organo->tieneimagen=$tieneimagen;
                        $organo->url=$imagen;
                        $organo->activo=$activo;
                        $organo->user_id=Auth::user()->id;

                        $organo->save();
                    }
                }
                

                

                if($tipo == '1'){
                    $msj='Registro del Rector actualizado con éxito';
                }
                elseif($tipo == '2'){
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
                    $msj='Registro del Consejo de Facultad actualizado con éxito';
                }
                elseif($tipo == '8'){
                    $msj='Registro del Director de Escuela actualizado con éxito';
                }
                elseif($tipo == '9'){
                    $msj='Registro del Jefe de Departamento Académico actualizado con éxito';
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

        $organo = Organo::findOrFail($id);

        if(intval($organo->nivel) == 0){
            Storage::disk('organoUNASAM')->delete($organo->url);
        }
        elseif(intval($organo->nivel) == 1){
            Storage::disk('organoFacultad')->delete($organo->url);
        }
        elseif(intval($organo->nivel) == 2){
            Storage::disk('organoProgramaEstudio')->delete($organo->url);
        }


        $organo->url='';
        $organo->save();

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
