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

use App\Resumen;
use App\Indicadorsineace;
use App\Imagenresumen;
use App\Numerosalumno;



use DateTime;

class IndexProgramaWebController extends Controller
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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $banners=Banner::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('posision')->orderBy('id')->get();
                $presentacion=Presentacion::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->first();
                //$resumen=Resumen::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->first();
                $linkinteres=Linkinteres::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('posision')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }

                $noticias = Noticia::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(2)->get();
                $eventos = Evento::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(4)->get();
                $comunicados = Comunicado::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->orderBy('id')->limit(3)->get();


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


                return view('web/programa/index',compact('escuela','unasam','facultad','redsocials','menusActivos','banners','presentacion','linkinteres','noticias','eventos','comunicados', 'plataformas','planesestudios'));




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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                
                $presentacion=Presentacion::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->first();
                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $linkinteres=Linkinteres::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('posision')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/presentacion',compact('presentacion','escuela','unasam','facultad','redsocials','menusActivos','linkinteres','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function resumen($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $resumen=Resumen::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->first();

                if ($resumen != null && $resumen->id != null) {    
                    $imagenresumen = Imagenresumen::where('activo','1')->where('borrado','0')->where('resumen_id', $resumen->id)->orderBy('posicion')->orderBy('id')->get();
                    $resumen->imagenresumen = $imagenresumen;
                    }

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/resumen',compact('resumen','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function campolaboral($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $campoLaboral=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('tipo', 5)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/campoLaboral',compact('campoLaboral','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $mision=Misionvision::where('borrado','0')->where('nivel', 2)->where('activo','1')->where('programaestudio_id',$id)->where('tipo', 1)->first();
                $vision=Misionvision::where('borrado','0')->where('nivel', 2)->where('activo','1')->where('programaestudio_id',$id)->where('tipo', 2)->first();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/misionvision',compact('mision','vision','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $historia=Historia::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->first();

                if ($historia != null && $historia->id != null) {    
                    $imagenhistoria = Imagenhistoria::where('activo','1')->where('borrado','0')->where('historia_id', $historia->id)->orderBy('posicion')->orderBy('id')->get();
                    $historia->imagenhistoria = $imagenhistoria;
                    }

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/historia',compact('historia','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $objetivos=Objetivo::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('programaestudio_id',$id)->orderBy('numero')->orderBy('id')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/objetivos',compact('objetivos','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

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

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/organigrama',compact('escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function competenciasespecificas($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $competenciasespecificas=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('tipo', 3)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "active";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/competenciasespecificas',compact('competenciasespecificas','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


   
    public function competenciasgenerales($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $competenciasgenerales=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('tipo', 4)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "active";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/competenciasgenerales',compact('competenciasgenerales','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function planesestudio($idhashPlanEstudio){


        $strdecoded = $idhashPlanEstudio;

        if($idhashPlanEstudio != null && strlen($idhashPlanEstudio) > 0){

            $idPlan = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhashPlanEstudio));

                if(strlen($strdecoded) > 14){
                    $idPlan = explode('-', $strdecoded);
                    $idPlan = $idPlan[1];
                }


                $planestudio = Indicadorsineace::find($idPlan);

                $escuela = Programaestudio::find($planestudio->programaestudio_id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$escuela->id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$escuela->id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$escuela->id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/planestudio',compact('planestudio','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function perfilingreso($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $perfilingreso=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('tipo', 1)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/perfilingreso',compact('perfilingreso','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function perfilegreso($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $perfilegreso=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2 )->where('tipo', 2)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/perfilegreso',compact('perfilegreso','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function matriculados($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $matriculados=Numerosalumno::where('borrado','0')->where('activo','1')->where('tipo', 1)->where('programaestudio_id',$id)->orderBy('anio','desc')->limit(12)->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/matriculados',compact('matriculados','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function egresados($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $egresados=Numerosalumno::where('borrado','0')->where('activo','1')->where('tipo', 2)->where('programaestudio_id',$id)->orderBy('anio','desc')->limit(12)->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/egresados',compact('egresados','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function graduados($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $graduados=Numerosalumno::where('borrado','0')->where('activo','1')->where('tipo', 3)->where('programaestudio_id',$id)->orderBy('anio','desc')->limit(12)->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/graduados',compact('graduados','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function titulados($idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }


                $titulados=Numerosalumno::where('borrado','0')->where('activo','1')->where('tipo', 4)->where('programaestudio_id',$id)->orderBy('anio','desc')->limit(12)->get();

                $escuela = Programaestudio::find($id);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$id));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$id)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$id)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
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


                return view('web/programa/titulados',compact('titulados','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));

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
