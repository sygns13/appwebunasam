<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Persona;
use App\Tipouser;
use App\User;

use App\Redsocial;

use stdClass;
use DB;
use Storage;

use Image;

class RedsocialController extends Controller
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

            $modulo="redsocialfacultad";

            return view('adminfacultad.redsocial.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index(Request $request)
    {
        $buscar=$request->busca;

        $redsocials=Redsocial::where('borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('nombre','like','%'.$buscar.'%');
            $query->orWhere('urlredsocial','like','%'.$buscar.'%');
            })
        ->where('facultad_id',1)
        ->where('nivel',1)
        ->orderBy('id')
        ->paginate(10);

          return [
            'pagination'=>[
                'total'=> $redsocials->total(),
                'current_page'=> $redsocials->currentPage(),
                'per_page'=> $redsocials->perPage(),
                'last_page'=> $redsocials->lastPage(),
                'from'=> $redsocials->firstItem(),
                'to'=> $redsocials->lastItem(),
            ],
            'redsocials'=>$redsocials
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
        $urlredsocial=$request->urlredsocial;
        $url=$request->url;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        if ($request->hasFile('imagen')) { 

            $aux='redsocial_fec-'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('imagen' => $img) ;
            $reglas = array('imagen' => 'required||mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo no es una imagen válida, ingrese otro archivo o limpie el formulario ";
            $result='0';
            $selector='imagen';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagen';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                $imgR = Image::make($img);
                $imgR->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                $subir=Storage::disk('redsocialFacultad')->put($nuevoNombre, $imgR);

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
            $msj="Debe de adjuntar el logo de la red social como una imagen válida, ingrese un archivo";
            $segureImg=1;
            $result='0';
            $selector='imagen';
        }

        if($segureImg==1){
            Storage::disk('redsocialFacultad')->delete($imagen);
        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('urlredsocial' => $urlredsocial);
            $reglas2 = array('urlredsocial' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la Red Social';
                $selector='txtnombre';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la dirección URL de la Red Social';
                $selector='txturlredsocial';
            }
            else{


                $redsocial = new Redsocial();
                $redsocial->nombre=$nombre;
                $redsocial->urlredsocial=$urlredsocial;
                $redsocial->url=$imagen;
                $redsocial->activo=$activo;
                $redsocial->borrado='0';
                $redsocial->nivel='1';
                $redsocial->user_id=Auth::user()->id;
                $redsocial->facultad_id='1';

                $redsocial->save();

                $msj='Nuevo Registro de Red social registrado con Éxito';

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

        $nombre=$request->nombre;
        $urlredsocial=$request->urlredsocial;
        $url=$request->url;
        $activo=$request->activo;

        $imagen="";
        $img=$request->imagen;
        $segureImg=0;

        $result='1';
        $msj='';
        $selector='';

        $oldImg=$request->oldimg;

        if ($request->hasFile('imagen')) { 

            $aux='redsocial_fec'.date('d-m-Y').'-'.date('H-i-s');
            $input  = array('image' => $img) ;
            $reglas = array('image' => 'required|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
            $validator = Validator::make($input, $reglas);

            $input2  = array('imagen' => $img) ;
            $reglas2 = array('imagen' => 'required|file:1,102400');
            $validatorF = Validator::make($input2, $reglas2);

            if ($validator->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo no es una imagen válida, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }
            elseif($validatorF->fails())
            {

            $segureImg=1;
            $msj="El archivo ingresado como logo tiene un tamaño no válido superior a los 10MB, ingrese otro archivo o limpie el formulario";
            $result='0';
            $selector='imagenE';
            }

            else
            {
                //$nombre=$img->getClientOriginalName();
                $extension=$img->getClientOriginalExtension();
                $nuevoNombre=$aux.".".$extension;

                $imgR = Image::make($img);
                $imgR->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->stream();

                $subir=Storage::disk('redsocialFacultad')->put($nuevoNombre, $imgR);

                if($subir){
                    $imagen=$nuevoNombre;

                }
                else{
                    $msj="Error al subir el logo, intentelo nuevamente luego";
                    $segureImg=1;
                    $result='0';
                    $selector='imagenE';
                }
            }
        }
        if($segureImg==1){
            Storage::disk('redsocialFacultad')->delete($imagen);
        }
        else{
            $input1  = array('nombre' => $nombre);
            $reglas1 = array('nombre' => 'required');

            $input2  = array('urlredsocial' => $urlredsocial);
            $reglas2 = array('urlredsocial' => 'required');

            $validator1 = Validator::make($input1, $reglas1);
            $validator2 = Validator::make($input2, $reglas2);

            if ($validator1->fails())
            {
                $result='0';
                $msj='Debe ingresar el nombre de la Red Social';
                $selector='txtnombreE';
            }
            elseif ($validator2->fails())
            {
                $result='0';
                $msj='Debe ingresar la dirección URL de la Red Social';
                $selector='txturlredsocialE';
            }
            else{


                if(strlen($imagen)>0)
                {
                    Storage::disk('redsocialFacultad')->delete($oldImg);
                    $redsocial = Redsocial::findOrFail($id);
                    $redsocial->nombre=$nombre;
                    $redsocial->urlredsocial=$urlredsocial;
                    $redsocial->url=$imagen;
                    $redsocial->activo=$activo;
                    $redsocial->nivel='1';
                    $redsocial->user_id=Auth::user()->id;
                    $redsocial->facultad_id='1';

                    $redsocial->save();
                }
                else
                {
                    $redsocial = Redsocial::findOrFail($id);
                    $redsocial->nombre=$nombre;
                    $redsocial->urlredsocial=$urlredsocial;
                    $redsocial->activo=$activo;
                    $redsocial->nivel='1';
                    $redsocial->user_id=Auth::user()->id;
                    $redsocial->facultad_id='1';

                    $redsocial->save();
                }

                $msj='El registro de red social ha sido modificado con éxito';

            }
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $redsocial = Redsocial::findOrFail($id);
        $redsocial->activo=$estado;
        $redsocial->save();

        if(strval($estado)=="0"){
            $msj='El registro de Red Social fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El registro de Red Social fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function deleteImg($id,$image)
    {
        $result='1';
        $msj='';
        $selector='';

        Storage::disk('redsocialFacultad')->delete($image);

        $redsocial = Redsocial::findOrFail($id);
        $redsocial->url='';
        $redsocial->save();

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



        $redsocial = Redsocial::findOrFail($id);

        if(Strlen($redsocial->url) > 0){
            Storage::disk('redsocialFacultad')->delete($redsocial->url);
        }
        
        //$task->delete();
        $redsocial->borrado='1';
        $redsocial->user_id=Auth::user()->id;
        $redsocial->save();

        $msj='Registro de Red Social eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }
}
