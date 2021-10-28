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
                $nombreMes = strtoupper(nombremes(intval($mes)));
                $iniNombreMes = substr($nombreMes, 0, 3);

                $dato->mes = $mes;
                $dato->dia = $dia;
                $dato->nombreMes = $nombreMes;
                $dato->iniNombreMes = $iniNombreMes;
            }
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

        return view('web/unasam/noticias',compact('noticias','redsocials','unasam','menusActivos','pagination','offset'));

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
                $nombreMes = strtoupper(nombremes(intval($mes)));
                $iniNombreMes = substr($nombreMes, 0, 3);

                $dato->mes = $mes;
                $dato->dia = $dia;
                $dato->nombreMes = $nombreMes;
                $dato->iniNombreMes = $iniNombreMes;
            }
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

        return view('web/unasam/eventos',compact('eventos','redsocials','unasam','menusActivos','pagination','offset'));

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
                $nombreMes = strtoupper(nombremes(intval($mes)));
                $iniNombreMes = substr($nombreMes, 0, 3);

                $dato->mes = $mes;
                $dato->dia = $dia;
                $dato->nombreMes = $nombreMes;
                $dato->iniNombreMes = $iniNombreMes;
            }
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

        return view('web/unasam/actividades',compact('comunicados','redsocials','unasam','menusActivos','pagination','offset'));

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
