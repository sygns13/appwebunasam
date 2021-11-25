<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Persona;
use App\Tipouser;
use App\User;

use stdClass;
use DB;
use Storage;

use App\Universidad;
use App\Facultad;
use App\Programaestudio;
use App\Departamentoacademico;

use App\Banner;
use App\Presentacion;
use App\Noticia;
use App\Imagennoticia;
use App\Evento;
use App\Imagenevento;
use App\Comunicado;
use App\Imagencomunicado;
use App\Redsocial;
use App\Linkinteres;
use App\Plataforma;

use App\Historia;
use App\Imagenhistoria;
use App\Misionvision;
use App\Objetivo;
use App\Organo;

use App\Licenciamiento;
use App\Docente;



use DateTime;

class IndexFacultadWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idhash)
    {
        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                $banners=Banner::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('posision')->orderBy('id')->get();
                $presentacion=Presentacion::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->first();
                $linkinteres=Linkinteres::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('posision')->get();


                $noticias = Noticia::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(2)->get();
                $eventos = Evento::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(4)->get();
                $comunicados = Comunicado::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(3)->get();

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                foreach ($noticias as $key => $dato) {    
                    $imagennoticia = Imagennoticia::where('activo','1')->where('borrado','0')->where('posicion','0')->where('noticia_id', $dato->id)->first();
                    $dato->imagennoticia = $imagennoticia;
        
                    if($dato->fecha != null && strlen($dato->fecha) > 0){
                        $date1  = new DateTime($dato->fecha);
        
                        $mes = $date1->format('m');
                        $dia = $date1->format('d');
                        $anio = $date1->format('Y');
                        $nombreMes = strtoupper(nombremes(intval($mes)));
                        $iniNombreMes = substr($nombreMes, 0, 3);
        
                        $dato->anio = $anio;
                        $dato->mes = $mes;
                        $dato->dia = $dia;
                        $dato->nombreMes = $nombreMes;
                        $dato->iniNombreMes = $iniNombreMes;
                    }
        
                    //hash id
                    $hash = base64_encode(gzdeflate('id-'.$dato->id));
                    $dato->hash = $hash;
                }
        
                foreach ($eventos as $key => $dato) {    
                    $eventoimagen = Imagenevento::where('activo','1')->where('borrado','0')->where('posicion','0')->where('evento_id', $dato->id)->first();
                    $dato->eventoimagen = $eventoimagen;
        
                    if($dato->fecha != null && strlen($dato->fecha) > 0){
                        $date1  = new DateTime($dato->fecha);
        
                        $mes = $date1->format('m');
                        $dia = $date1->format('d');
                        $anio = $date1->format('Y');
                        $nombreMes = strtoupper(nombremes(intval($mes)));
                        $iniNombreMes = substr($nombreMes, 0, 3);
        
                        $dato->anio = $anio;
                        $dato->mes = $mes;
                        $dato->dia = $dia;
                        $dato->nombreMes = $nombreMes;
                        $dato->iniNombreMes = $iniNombreMes;
                    }
                    //hash id
                    $hash = base64_encode(gzdeflate('id-'.$dato->id));
                    $dato->hash = $hash;
                }
        
                foreach ($comunicados as $key => $dato) {    
                    $imagencomunicado = Imagencomunicado::where('activo','1')->where('borrado','0')->where('posicion','0')->where('comunicado_id', $dato->id)->first();
                    $dato->imagencomunicado = $imagencomunicado;
        
                    if($dato->fecha != null && strlen($dato->fecha) > 0){
                        $date1  = new DateTime($dato->fecha);
        
                        $mes = $date1->format('m');
                        $dia = $date1->format('d');
                        $year = $date1->format('Y');
                        $nombreMes = strtoupper(nombremes(intval($mes)));
                        $iniNombreMes = substr($nombreMes, 0, 3);
        
                        $dato->mes = $mes;
                        $dato->dia = $dia;
                        $dato->nombreMes = $nombreMes;
                        $dato->iniNombreMes = $iniNombreMes;
                        $dato->year = $year ;
                    }
                    //hash id
                    $hash = base64_encode(gzdeflate('id-'.$dato->id));
                    $dato->hash = $hash;
                }

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "active";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                $plataformas=Plataforma::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();


                return view('web/facultad/index',compact('facultad','unasam','redsocials','menusActivos','banners','presentacion','linkinteres','noticias','eventos','comunicados','escuelas', 'plataformas'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');
    }



    public function presentacion($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                
                $presentacion=Presentacion::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->first();
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "active";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/presentacion',compact('presentacion','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function historia($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                    $historia=Historia::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->first();

                    if ($historia != null && $historia->id != null) {    
                        $imagenhistoria = Imagenhistoria::where('activo','1')->where('borrado','0')->where('historia_id', $historia->id)->orderBy('posicion')->orderBy('id')->get();
                        $historia->imagenhistoria = $imagenhistoria;
                        }

                    $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                    $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                    
                    $facultad = Facultad::find($id);

                    //hash id
                    $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                    $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                    foreach ($escuelas as $key => $dato2) {
                        $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                    }

                    $menusActivos = new stdClass;

                    $menusActivos->menu1 = "";
                    $menusActivos->menu2 = "active";
                    $menusActivos->menu3 = "";
                    $menusActivos->menu4 = "";
                    $menusActivos->menu5 = "";
                    $menusActivos->menu6 = "";
                    $menusActivos->menu7 = "";
                    $menusActivos->menu8 = "";
                    $menusActivos->menu9 = "";

                    
                    return view('web/facultad/historia',compact('historia','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function misionvision($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $mision=Misionvision::where('borrado','0')->where('nivel', 1)->where('activo','1')->where('facultad_id',$id)->where('tipo', 1)->first();
                $vision=Misionvision::where('borrado','0')->where('nivel', 1)->where('activo','1')->where('facultad_id',$id)->where('tipo', 2)->first();

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "active";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/misionvision',compact('mision','vision','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function objetivos($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $objetivos=Objetivo::where('borrado','0')->where('activo','1')->where('nivel', 1 )->where('facultad_id',$id)->orderBy('numero')->orderBy('id')->get();
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "active";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/objetivos',compact('objetivos','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function organigrama($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "active";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/organigrama',compact('redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function decano($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $organo = Organo::where('activo','1')->where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('tipo',6)->first();

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/decano',compact('organo','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function consejofacultad($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $organo = Organo::where('activo','1')->where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('tipo',7)->first();

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/consejofacultad',compact('organo','redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function directores($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                    $organo = Organo::where('activo','1')->where('borrado','0')->where('nivel',2)->where('programaestudio_id', $dato2->id)->where('tipo',8)->first();
                    $dato2->director = $organo;

                    
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/directores',compact('redsocials','facultad','menusActivos', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function director($idhash, $idhashFacultad){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashFacultad != null && strlen($idhashFacultad) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedFacultad = gzinflate(base64_decode($idhashFacultad));

                if(strlen($strdecodedFacultad) > 15){
                    $idFacultad = explode('-', $strdecodedFacultad);
                    $idFacultad = $idFacultad[1];
                }

                $organo = Organo::where('activo','1')->where('borrado','0')->where('nivel',2)->where('programaestudio_id', $id)->where('tipo',8)->first();

                $escuela = Programaestudio::find($id);
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$idFacultad)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($idFacultad);

                

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$idFacultad));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $idFacultad)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/facultad/director',compact('organo','redsocials','facultad','menusActivos', 'escuelas','escuela'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function jefesdepartamentos($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $jefeDepartamentos = Departamentoacademico::where('borrado','0')->where('activo','1')->where('facultad_id',$id)->orderBy('id')->get();

                foreach ($jefeDepartamentos as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijojefe-'.$dato2->id));
                }
                

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));                   
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/jefesdepartamentos',compact('redsocials','facultad','menusActivos', 'escuelas','jefeDepartamentos'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function jefedepartamento($idhash, $idhashFacultad){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashFacultad != null && strlen($idhashFacultad) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedFacultad = gzinflate(base64_decode($idhashFacultad));

                if(strlen($strdecodedFacultad) > 15){
                    $idFacultad = explode('-', $strdecodedFacultad);
                    $idFacultad = $idFacultad[1];
                }

                $jefeDepartamento = Departamentoacademico::find($id);

                
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$idFacultad)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($idFacultad);

                

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$idFacultad));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $idFacultad)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));
                }

                

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "active";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/facultad/jefedepartamento',compact('jefeDepartamento','redsocials','facultad','menusActivos', 'escuelas'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function servicios($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $servicios=Licenciamiento::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('tipo', 3 )->where('facultad_id',$id)->orderBy('id','desc')->get();

                

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));                   
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "active";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                

                return view('web/facultad/servicios',compact('redsocials','facultad','menusActivos', 'escuelas','servicios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function docentes($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $docentes=Docente::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('departamentoacademico_id')->orderBy('nombre')->orderBy('id')->get();

                $departamentos = Departamentoacademico::where('borrado','0')->where('activo','1')->where('facultad_id',$id)->orderBy('id')->get();

                

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                
                $facultad = Facultad::find($id);

                //hash id
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));

                $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $id)->orderBy('nombre')->get();

                foreach ($escuelas as $key => $dato2) {
                    $dato2->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));                   
                }
               

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "active";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                

                return view('web/facultad/docentes',compact('redsocials','facultad','menusActivos', 'escuelas','docentes','departamentos'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

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
        //
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
