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
use App\Redsocial;

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

                $redsocials=Redsocial::where('borrado','0')->where('activo','1')->where('nivel', 1)->where('facultad_id',$id)->orderBy('id')->get();
                $unasam = Universidad::where('activo','1')->where('borrado','0')->first();

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


                return view('web/facultad/index',compact('facultad','redsocials','unasam','menusActivos'));




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
