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
                $facultad->hash = base64_encode(gzdeflate('idhijofacultad-'.$id));
                
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