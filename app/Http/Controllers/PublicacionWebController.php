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
use App\Redsocial;

use App\Noticia;
use App\Imagennoticia;
use App\Evento;
use App\Imagenevento;
use App\Comunicado;
use App\Imagencomunicado;

use App\Documento;
use App\Indicadorsineace;

use App\Facultad;
use App\Programaestudio;

use DateTime;

class PublicacionWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noticias(Request $request){

        $noticias = Noticia::where('borrado','0')->where('nivel', 0)->where('activo','1')->paginate(10);

        foreach ($noticias as $key => $dato) {    
            $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $dato->id)->orderBy('posicion')->get();
            $dato->imagennoticias = $imagennoticias;

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

        $pagination = new stdClass;

        $pagination->total = $noticias->total();
        $pagination->current_page = $noticias->currentPage();
        $pagination->per_page = $noticias->perPage();
        $pagination->last_page = $noticias->lastPage();
        $pagination->from = $noticias->firstItem();
        $pagination->to = $noticias->lastItem();

        $offset = 9; // Modificar aqui para variaf el offset de la paginación


        $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

        $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
        $totalRegistros = 0;

        $FacultadesEscuelas = array();

        foreach ($facultades as $key => $dato) {

            $FacultadEscuela = new stdClass;

            $FacultadEscuela->nombre = $dato->nombre;
            $FacultadEscuela->nivel = 1;
            $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

            array_push($FacultadesEscuelas, $FacultadEscuela);

            
            $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
            $dato->escuelas = $escuelas;

            foreach ($escuelas as $key => $dato2) {

                $FacultadEscuela = new stdClass;

                $FacultadEscuela->nombre = $dato2->nombre;
                $FacultadEscuela->nivel = 2;
                $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                array_push($FacultadesEscuelas, $FacultadEscuela);
            }
        }

        $totalRegistros = count($FacultadesEscuelas);

        $menusActivos = new stdClass;

        $menusActivos->menu1 = "";
        $menusActivos->menu2 = "";
        $menusActivos->menu3 = "";
        $menusActivos->menu4 = "";
        $menusActivos->menu5 = "";
        $menusActivos->menu6 = "";
        $menusActivos->menu7 = "";
        $menusActivos->menu8 = "";
        $menusActivos->menu9 = "active";

        return view('web/unasam/noticias',compact('noticias','redsocials','unasam','menusActivos','pagination','offset', 'FacultadesEscuelas','totalRegistros'));

    }



    public function noticiasFacultad(Request $request, $idhash){


        $strdecoded = $request->$idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $noticias = Noticia::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->paginate(10);

                foreach ($noticias as $key => $dato) {    
                    $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imagennoticias = $imagennoticias;

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

                $pagination = new stdClass;

                $pagination->total = $noticias->total();
                $pagination->current_page = $noticias->currentPage();
                $pagination->per_page = $noticias->perPage();
                $pagination->last_page = $noticias->lastPage();
                $pagination->from = $noticias->firstItem();
                $pagination->to = $noticias->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación


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
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                

                return view('web/facultad/noticias',compact('noticias','redsocials','facultad','menusActivos','pagination','offset', 'escuelas'));


            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }






    public function noticiasPrograma(Request $request, $idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                


                $noticias = Noticia::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->paginate(10);

                foreach ($noticias as $key => $dato) {    
                    $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imagennoticias = $imagennoticias;

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

                $pagination = new stdClass;

                $pagination->total = $noticias->total();
                $pagination->current_page = $noticias->currentPage();
                $pagination->per_page = $noticias->perPage();
                $pagination->last_page = $noticias->lastPage();
                $pagination->from = $noticias->firstItem();
                $pagination->to = $noticias->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación

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
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                

                return view('web/programa/noticias',compact('noticias','escuela','unasam','facultad','redsocials','menusActivos','planesestudios','pagination','offset'));


            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function eventos(Request $request){

        $eventos = Evento::where('borrado','0')->where('nivel', 0)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

        foreach ($eventos as $key => $dato) {    
            $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $dato->id)->orderBy('posicion')->get();
            $dato->imageneventos = $imageneventos;

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

        $pagination = new stdClass;

        $pagination->total = $eventos->total();
        $pagination->current_page = $eventos->currentPage();
        $pagination->per_page = $eventos->perPage();
        $pagination->last_page = $eventos->lastPage();
        $pagination->from = $eventos->firstItem();
        $pagination->to = $eventos->lastItem();

        $offset = 9; // Modificar aqui para variaf el offset de la paginación


        $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

        $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
        $totalRegistros = 0;

        $FacultadesEscuelas = array();

        foreach ($facultades as $key => $dato) {

            $FacultadEscuela = new stdClass;

            $FacultadEscuela->nombre = $dato->nombre;
            $FacultadEscuela->nivel = 1;
            $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

            array_push($FacultadesEscuelas, $FacultadEscuela);

            
            $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
            $dato->escuelas = $escuelas;

            foreach ($escuelas as $key => $dato2) {

                $FacultadEscuela = new stdClass;

                $FacultadEscuela->nombre = $dato2->nombre;
                $FacultadEscuela->nivel = 2;
                $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                array_push($FacultadesEscuelas, $FacultadEscuela);
            }
        }

        $totalRegistros = count($FacultadesEscuelas);

        $menusActivos = new stdClass;

        $menusActivos->menu1 = "";
        $menusActivos->menu2 = "";
        $menusActivos->menu3 = "";
        $menusActivos->menu4 = "";
        $menusActivos->menu5 = "";
        $menusActivos->menu6 = "";
        $menusActivos->menu7 = "";
        $menusActivos->menu8 = "";
        $menusActivos->menu9 = "active";

        return view('web/unasam/eventos',compact('eventos','redsocials','unasam','menusActivos','pagination','offset', 'FacultadesEscuelas','totalRegistros'));

    }

    public function eventosFacultad(Request $request, $idhash){


        $strdecoded = $request->$idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $eventos = Evento::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

                foreach ($eventos as $key => $dato) {    
                    $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imageneventos = $imageneventos;

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

                $pagination = new stdClass;

                $pagination->total = $eventos->total();
                $pagination->current_page = $eventos->currentPage();
                $pagination->per_page = $eventos->perPage();
                $pagination->last_page = $eventos->lastPage();
                $pagination->from = $eventos->firstItem();
                $pagination->to = $eventos->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación


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
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/eventos',compact('eventos','redsocials','facultad','menusActivos','pagination','offset', 'escuelas'));
                
            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function eventosPrograma(Request $request, $idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }
                $eventos = Evento::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

                foreach ($eventos as $key => $dato) {    
                    $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imageneventos = $imageneventos;

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

                $pagination = new stdClass;

                $pagination->total = $eventos->total();
                $pagination->current_page = $eventos->currentPage();
                $pagination->per_page = $eventos->perPage();
                $pagination->last_page = $eventos->lastPage();
                $pagination->from = $eventos->firstItem();
                $pagination->to = $eventos->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación

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
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/programa/eventos',compact('eventos','escuela','unasam','facultad','redsocials','menusActivos','planesestudios','pagination','offset'));
                
            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function actividades(Request $request){

        $comunicados = Comunicado::where('borrado','0')->where('nivel', 0)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

        foreach ($comunicados as $key => $dato) {    
            $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $dato->id)->orderBy('posicion')->get();
            $dato->imagencomunicados = $imagencomunicados;

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

        $pagination = new stdClass;

        $pagination->total = $comunicados->total();
        $pagination->current_page = $comunicados->currentPage();
        $pagination->per_page = $comunicados->perPage();
        $pagination->last_page = $comunicados->lastPage();
        $pagination->from = $comunicados->firstItem();
        $pagination->to = $comunicados->lastItem();

        $offset = 9; // Modificar aqui para variaf el offset de la paginación


        $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

        $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
        $totalRegistros = 0;

        $FacultadesEscuelas = array();

        foreach ($facultades as $key => $dato) {

            $FacultadEscuela = new stdClass;

            $FacultadEscuela->nombre = $dato->nombre;
            $FacultadEscuela->nivel = 1;
            $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

            array_push($FacultadesEscuelas, $FacultadEscuela);

            
            $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
            $dato->escuelas = $escuelas;

            foreach ($escuelas as $key => $dato2) {

                $FacultadEscuela = new stdClass;

                $FacultadEscuela->nombre = $dato2->nombre;
                $FacultadEscuela->nivel = 2;
                $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                array_push($FacultadesEscuelas, $FacultadEscuela);
            }
        }

        $totalRegistros = count($FacultadesEscuelas);

        $menusActivos = new stdClass;

        $menusActivos->menu1 = "";
        $menusActivos->menu2 = "";
        $menusActivos->menu3 = "";
        $menusActivos->menu4 = "";
        $menusActivos->menu5 = "";
        $menusActivos->menu6 = "";
        $menusActivos->menu7 = "";
        $menusActivos->menu8 = "";
        $menusActivos->menu9 = "active";

        return view('web/unasam/actividades',compact('comunicados','redsocials','unasam','menusActivos','pagination','offset', 'FacultadesEscuelas','totalRegistros'));

    }

    public function comunicadosFacultad(Request $request, $idhash){


        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $comunicados = Comunicado::where('borrado','0')->where('nivel', 1)->where('facultad_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

                foreach ($comunicados as $key => $dato) {    
                    $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imagencomunicados = $imagencomunicados;

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

                $pagination = new stdClass;

                $pagination->total = $comunicados->total();
                $pagination->current_page = $comunicados->currentPage();
                $pagination->per_page = $comunicados->perPage();
                $pagination->last_page = $comunicados->lastPage();
                $pagination->from = $comunicados->firstItem();
                $pagination->to = $comunicados->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación


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
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/facultad/comunicados',compact('comunicados','redsocials','facultad','menusActivos','pagination','offset', 'escuelas'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function comunicadosPrograma(Request $request, $idhash){


        $strdecoded = $request->$idhash;

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 14){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }
                

                $comunicados = Comunicado::where('borrado','0')->where('nivel', 2)->where('programaestudio_id',$id)->where('activo','1')->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(10);

                foreach ($comunicados as $key => $dato) {    
                    $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $dato->id)->orderBy('posicion')->get();
                    $dato->imagencomunicados = $imagencomunicados;

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

                $pagination = new stdClass;

                $pagination->total = $comunicados->total();
                $pagination->current_page = $comunicados->currentPage();
                $pagination->per_page = $comunicados->perPage();
                $pagination->last_page = $comunicados->lastPage();
                $pagination->from = $comunicados->firstItem();
                $pagination->to = $comunicados->lastItem();

                $offset = 9; // Modificar aqui para variaf el offset de la paginación

                

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
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                return view('web/programa/comunicados',compact('comunicados','escuela','unasam','facultad','redsocials','menusActivos','planesestudios','pagination','offset'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function noticia($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $noticia = Noticia::find($id);

                $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia->id)->orderBy('posicion')->get();
                $noticia->imagennoticias = $imagennoticias;

                if($noticia->fecha != null && strlen($noticia->fecha) > 0){
                    $date1  = new DateTime($noticia->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $noticia->anio = $anio;
                    $noticia->mes = $mes;
                    $noticia->dia = $dia;
                    $noticia->nombreMes = $nombreMes;
                    $noticia->iniNombreMes = $iniNombreMes;
                }

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
                $totalRegistros = 0;

                $FacultadesEscuelas = array();

                foreach ($facultades as $key => $dato) {

                    $FacultadEscuela = new stdClass;

                    $FacultadEscuela->nombre = $dato->nombre;
                    $FacultadEscuela->nivel = 1;
                    $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

                    array_push($FacultadesEscuelas, $FacultadEscuela);

                    
                    $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
                    $dato->escuelas = $escuelas;

                    foreach ($escuelas as $key => $dato2) {

                        $FacultadEscuela = new stdClass;

                        $FacultadEscuela->nombre = $dato2->nombre;
                        $FacultadEscuela->nivel = 2;
                        $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                        array_push($FacultadesEscuelas, $FacultadEscuela);
                    }
                }

                $totalRegistros = count($FacultadesEscuelas);

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "active";


                return view('web/unasam/noticia',compact('noticia','redsocials','unasam','menusActivos', 'FacultadesEscuelas','totalRegistros'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function noticiaFacultad($idhash, $idhashFacultad){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashFacultad != null && strlen($idhashFacultad) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                $id ="";
                $idFacultad ="";

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedFacultad = gzinflate(base64_decode($idhashFacultad));

                if(strlen($strdecodedFacultad) > 15){
                    $idFacultad = explode('-', $strdecodedFacultad);
                    $idFacultad = $idFacultad[1];
                }

                $noticia = Noticia::find($id);

                $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia->id)->orderBy('posicion')->get();
                $noticia->imagennoticias = $imagennoticias;

                if($noticia->fecha != null && strlen($noticia->fecha) > 0){
                    $date1  = new DateTime($noticia->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $noticia->anio = $anio;
                    $noticia->mes = $mes;
                    $noticia->dia = $dia;
                    $noticia->nombreMes = $nombreMes;
                    $noticia->iniNombreMes = $iniNombreMes;
                }

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
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/facultad/noticia',compact('noticia','redsocials','facultad','menusActivos', 'escuelas'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function noticiaPrograma($idhash, $idhashPrograma){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashPrograma != null && strlen($idhashPrograma) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                $id ="";
                $idPrograma ="";

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedPrograma = gzinflate(base64_decode($idhashPrograma));

                if(strlen($strdecodedPrograma) > 14){
                    $idPrograma = explode('-', $strdecodedPrograma);
                    $idPrograma = $idPrograma[1];
                }

                $noticia = Noticia::find($id);

                $imagennoticias = Imagennoticia::where('activo','1')->where('borrado','0')->where('noticia_id', $noticia->id)->orderBy('posicion')->get();
                $noticia->imagennoticias = $imagennoticias;

                if($noticia->fecha != null && strlen($noticia->fecha) > 0){
                    $date1  = new DateTime($noticia->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $noticia->anio = $anio;
                    $noticia->mes = $mes;
                    $noticia->dia = $dia;
                    $noticia->nombreMes = $nombreMes;
                    $noticia->iniNombreMes = $iniNombreMes;
                }

                
                $escuela = Programaestudio::find($idPrograma);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$idPrograma));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$idPrograma)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$idPrograma)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/noticia',compact('noticia','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function evento($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $evento = Evento::find($id);

                $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento->id)->orderBy('posicion')->get();
                $evento->imageneventos = $imageneventos;

                if($evento->fecha != null && strlen($evento->fecha) > 0){
                    $date1  = new DateTime($evento->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $evento->anio = $anio;
                    $evento->mes = $mes;
                    $evento->dia = $dia;
                    $evento->nombreMes = $nombreMes;
                    $evento->iniNombreMes = $iniNombreMes;
                }

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
                $totalRegistros = 0;

                $FacultadesEscuelas = array();

                foreach ($facultades as $key => $dato) {

                    $FacultadEscuela = new stdClass;

                    $FacultadEscuela->nombre = $dato->nombre;
                    $FacultadEscuela->nivel = 1;
                    $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

                    array_push($FacultadesEscuelas, $FacultadEscuela);

                    
                    $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
                    $dato->escuelas = $escuelas;

                    foreach ($escuelas as $key => $dato2) {

                        $FacultadEscuela = new stdClass;

                        $FacultadEscuela->nombre = $dato2->nombre;
                        $FacultadEscuela->nivel = 2;
                        $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                        array_push($FacultadesEscuelas, $FacultadEscuela);
                    }
                }

                $totalRegistros = count($FacultadesEscuelas);

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "active";


                return view('web/unasam/evento',compact('evento','redsocials','unasam','menusActivos','FacultadesEscuelas','totalRegistros'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function eventoFacultad($idhash, $idhashFacultad){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashFacultad != null && strlen($idhashFacultad) > 0){

            $id = "";
            $idFacultad = "";
            
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

                $evento = Evento::find($id);

                $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento->id)->orderBy('posicion')->get();
                $evento->imageneventos = $imageneventos;

                if($evento->fecha != null && strlen($evento->fecha) > 0){
                    $date1  = new DateTime($evento->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $evento->anio = $anio;
                    $evento->mes = $mes;
                    $evento->dia = $dia;
                    $evento->nombreMes = $nombreMes;
                    $evento->iniNombreMes = $iniNombreMes;
                }

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
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/facultad/evento',compact('evento','redsocials','facultad','menusActivos', 'escuelas'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function eventoPrograma($idhash, $idhashPrograma){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashPrograma != null && strlen($idhashPrograma) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                $id ="";
                $idPrograma ="";

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedPrograma = gzinflate(base64_decode($idhashPrograma));

                if(strlen($strdecodedPrograma) > 14){
                    $idPrograma = explode('-', $strdecodedPrograma);
                    $idPrograma = $idPrograma[1];
                }

                $evento = Evento::find($id);

                $imageneventos = Imagenevento::where('activo','1')->where('borrado','0')->where('evento_id', $evento->id)->orderBy('posicion')->get();
                $evento->imageneventos = $imageneventos;

                if($evento->fecha != null && strlen($evento->fecha) > 0){
                    $date1  = new DateTime($evento->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $evento->anio = $anio;
                    $evento->mes = $mes;
                    $evento->dia = $dia;
                    $evento->nombreMes = $nombreMes;
                    $evento->iniNombreMes = $iniNombreMes;
                }


                $escuela = Programaestudio::find($idPrograma);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$idPrograma));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$idPrograma)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$idPrograma)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }



                

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/evento',compact('evento','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));



            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }

    public function actividad($idhash){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $comunicado = Comunicado::find($id);

                $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $comunicado->id)->orderBy('posicion')->get();
                $comunicado->imagencomunicados = $imagencomunicados;

                if($comunicado->fecha != null && strlen($comunicado->fecha) > 0){
                    $date1  = new DateTime($comunicado->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $comunicado->anio = $anio;
                    $comunicado->mes = $mes;
                    $comunicado->dia = $dia;
                    $comunicado->nombreMes = $nombreMes;
                    $comunicado->iniNombreMes = $iniNombreMes;
                }

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
                $totalRegistros = 0;

                $FacultadesEscuelas = array();

                foreach ($facultades as $key => $dato) {

                    $FacultadEscuela = new stdClass;

                    $FacultadEscuela->nombre = $dato->nombre;
                    $FacultadEscuela->nivel = 1;
                    $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

                    array_push($FacultadesEscuelas, $FacultadEscuela);

                    
                    $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
                    $dato->escuelas = $escuelas;

                    foreach ($escuelas as $key => $dato2) {

                        $FacultadEscuela = new stdClass;

                        $FacultadEscuela->nombre = $dato2->nombre;
                        $FacultadEscuela->nivel = 2;
                        $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                        array_push($FacultadesEscuelas, $FacultadEscuela);
                    }
                }

                $totalRegistros = count($FacultadesEscuelas);

                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "active";


                return view('web/unasam/actividad',compact('comunicado','redsocials','unasam','menusActivos', 'FacultadesEscuelas','totalRegistros'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function comunicadoFacultad($idhash, $idhashFacultad){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashFacultad != null && strlen($idhashFacultad) > 0){

            $id = "";
            $idFacultad = "";
            
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

                $comunicado = Comunicado::find($id);

                $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $comunicado->id)->orderBy('posicion')->get();
                $comunicado->imagencomunicados = $imagencomunicados;

                if($comunicado->fecha != null && strlen($comunicado->fecha) > 0){
                    $date1  = new DateTime($comunicado->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $comunicado->anio = $anio;
                    $comunicado->mes = $mes;
                    $comunicado->dia = $dia;
                    $comunicado->nombreMes = $nombreMes;
                    $comunicado->iniNombreMes = $iniNombreMes;
                }

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
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/facultad/comunicado',compact('comunicado','redsocials','facultad','menusActivos', 'escuelas'));




            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }



    public function comunicadoPrograma($idhash, $idhashPrograma){

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0 && $idhashPrograma != null && strlen($idhashPrograma) > 0){
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                $id ="";
                $idPrograma ="";

                if(strlen($strdecoded) > 3){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $strdecodedPrograma = gzinflate(base64_decode($idhashPrograma));

                if(strlen($strdecodedPrograma) > 14){
                    $idPrograma = explode('-', $strdecodedPrograma);
                    $idPrograma = $idPrograma[1];
                }

                $comunicado = Comunicado::find($id);

                $imagencomunicados = Imagencomunicado::where('activo','1')->where('borrado','0')->where('comunicado_id', $comunicado->id)->orderBy('posicion')->get();
                $comunicado->imagencomunicados = $imagencomunicados;

                if($comunicado->fecha != null && strlen($comunicado->fecha) > 0){
                    $date1  = new DateTime($comunicado->fecha);

                    $mes = $date1->format('m');
                    $dia = $date1->format('d');
                    $anio = $date1->format('Y');
                    $nombreMes = strtoupper(nombremes(intval($mes)));
                    $iniNombreMes = substr($nombreMes, 0, 3);

                    $comunicado->anio = $anio;
                    $comunicado->mes = $mes;
                    $comunicado->dia = $dia;
                    $comunicado->nombreMes = $nombreMes;
                    $comunicado->iniNombreMes = $iniNombreMes;
                }

                $escuela = Programaestudio::find($idPrograma);
                $facultad = Facultad::find($escuela->facultad_id);
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

                //hash id
                $escuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$idPrograma));
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$escuela->facultad_id));
                
                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('programaestudio_id',$idPrograma)->orderBy('id')->get();
                $planesestudios=Indicadorsineace::where('borrado','0')->where('activo','1')->where('nivel', 2)->where('tipo', 6)->where('programaestudio_id',$idPrograma)->orderBy('id','desc')->get();

                foreach ($planesestudios as $key => $value) {
                    $planesestudios[$key]->hash = base64_encode(gzdeflate('idplanestudio-'.$value->id));
                }


                $menusActivos = new stdClass;

                $menusActivos->menu1 = "";
                $menusActivos->menu2 = "";
                $menusActivos->menu3 = "";
                $menusActivos->menu4 = "";
                $menusActivos->menu5 = "";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "active";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";


                return view('web/programa/comunicado',compact('comunicado','escuela','unasam','facultad','redsocials','menusActivos','planesestudios'));


            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');

    }


    public function documentos()
    {
        $documentos = Documento::where('borrado','0')->where('nivel', 0)->where('activo','1')->where('tipo', 1)->orderBy('numero')->orderBy('id')->get();

        $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

        $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
        $totalRegistros = 0;

        $FacultadesEscuelas = array();

        foreach ($facultades as $key => $dato) {

            $FacultadEscuela = new stdClass;

            $FacultadEscuela->nombre = $dato->nombre;
            $FacultadEscuela->nivel = 1;
            $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

            array_push($FacultadesEscuelas, $FacultadEscuela);

            
            $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
            $dato->escuelas = $escuelas;

            foreach ($escuelas as $key => $dato2) {

                $FacultadEscuela = new stdClass;

                $FacultadEscuela->nombre = $dato2->nombre;
                $FacultadEscuela->nivel = 2;
                $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                array_push($FacultadesEscuelas, $FacultadEscuela);
            }
        }

        $totalRegistros = count($FacultadesEscuelas);

        $menusActivos = new stdClass;

        $menusActivos->menu1 = "";
        $menusActivos->menu2 = "";
        $menusActivos->menu3 = "";
        $menusActivos->menu4 = "";
        $menusActivos->menu5 = "";
        $menusActivos->menu6 = "";
        $menusActivos->menu7 = "";
        $menusActivos->menu8 = "active";
        $menusActivos->menu9 = "";

        return view('web/unasam/documentos',compact('documentos','redsocials','unasam','menusActivos', 'FacultadesEscuelas','totalRegistros'));
    }


    public function documentosFacultad($idhash)
    {

        $strdecoded = $idhash;

        if($idhash != null && strlen($idhash) > 0){

            $id = "";
            
            
            try {
                $strdecoded = gzinflate(base64_decode($idhash));

                if(strlen($strdecoded) > 15){
                    $id = explode('-', $strdecoded);
                    $id = $id[1];
                }

                $documentos = Documento::where('borrado','0')->where('nivel', 1)->where('activo','1')->where('tipo', 1)->where('facultad_id',$id)->orderBy('numero')->orderBy('id')->get();

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
                $menusActivos->menu5 = "active";
                $menusActivos->menu6 = "";
                $menusActivos->menu7 = "";
                $menusActivos->menu8 = "";
                $menusActivos->menu9 = "";

                

                return view('web/facultad/documentos',compact('redsocials','facultad','menusActivos', 'escuelas','documentos'));

            } catch (Exception $e) {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/');
    }


    public function informes()
    {
        $informes = Documento::where('borrado','0')->where('nivel', 0)->where('activo','1')->where('tipo', 2)->orderBy('numero')->orderBy('id')->get();

        $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 0)->orderBy('id')->get();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

        $facultades = Facultad::where('borrado','0')->where('activo','1')->orderBy('nombre')->get();
        $totalRegistros = 0;

        $FacultadesEscuelas = array();

        foreach ($facultades as $key => $dato) {

            $FacultadEscuela = new stdClass;

            $FacultadEscuela->nombre = $dato->nombre;
            $FacultadEscuela->nivel = 1;
            $FacultadEscuela->hash = base64_encode(gzdeflate('idhijofacultad-'.$dato->id));

            array_push($FacultadesEscuelas, $FacultadEscuela);

            
            $escuelas = Programaestudio::where('borrado','0')->where('activo','1')->where('facultad_id', $dato->id)->orderBy('nombre')->get();
            $dato->escuelas = $escuelas;

            foreach ($escuelas as $key => $dato2) {

                $FacultadEscuela = new stdClass;

                $FacultadEscuela->nombre = $dato2->nombre;
                $FacultadEscuela->nivel = 2;
                $FacultadEscuela->hash = base64_encode(gzdeflate('idhijoescuela-'.$dato2->id));

                array_push($FacultadesEscuelas, $FacultadEscuela);
            }
        }

        $totalRegistros = count($FacultadesEscuelas);

        $menusActivos = new stdClass;

        $menusActivos->menu1 = "";
        $menusActivos->menu2 = "";
        $menusActivos->menu3 = "";
        $menusActivos->menu4 = "";
        $menusActivos->menu5 = "";
        $menusActivos->menu6 = "";
        $menusActivos->menu7 = "";
        $menusActivos->menu8 = "active";
        $menusActivos->menu9 = "";

        return view('web/unasam/informes',compact('informes','redsocials','unasam','menusActivos', 'FacultadesEscuelas','totalRegistros'));
    }

    public function index()
    {
        //
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
