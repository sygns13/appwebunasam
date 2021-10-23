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


use App\Banner;
use App\Presentacion;
use App\Universidad;
use App\Noticia;
use App\Imagennoticia;

use DateTime;

class IndexWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::where('borrado','0')->where('activo','1')->where('nivel', 0 )->orderBy('posision')->get();
        $presentacion=Presentacion::where('borrado','0')->where('nivel', 0)->where('activo','1')->first();
        $unasam = Universidad::where('activo','1')->where('borrado','0')->first();
        $noticias = Noticia::where('borrado','0')->where('nivel', 0)->where('activo','1')->orderBy('hora','desc')->orderBy('id')->limit(4)->get();

        foreach ($noticias as $key => $dato) {    
            $imagennoticia = Imagennoticia::where('activo','1')->where('borrado','0')->where('posicion','0')->where('noticia_id', $dato->id)->first();
            $dato->imagennoticia = $imagennoticia;

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


        return view('web/unasam/index',compact('banners','presentacion','unasam','noticias'));
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