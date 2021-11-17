<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

use App\Persona;
use App\Tipouser;
use App\User;
use App\Facultad;
use App\Programaestudio;

use App\Permiso;
use App\Rolmodulo;
use App\Rolsubmodulo;

use App\Modulo;
use App\Submodulo;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;

use stdClass;


class UserController extends Controller     
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        if(accesoUser([1])){


            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);


            $modulo = "usuario";
            $tipousers = Tipouser::orderBy('id')->where('borrado','0')->get();

            $facultads = Facultad::orderBy('nombre')->where('borrado','0')->get();
            $programaestudios = Programaestudio::orderBy('id')->where('borrado','0')->get();
            $modulos = Modulo::orderBy('id')->where('borrado','0')->get();
            $submodulos=Submodulo::orderBy('id')->where('borrado','0')->get();


            return view('usuario.index',compact('tipouser','modulo','tipousers','facultads','programaestudios','modulos','submodulos'));
        }
        else
        {
            return redirect('home');    
        }
    }

    public function index2()
    {
        if(accesoUser([1,2,3,4,5])){


            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);



            $modulo="miperfil";
            return view('miperfil.index',compact('tipouser','modulo'));
        }
        else
        {
            return redirect('home');           
        }
    }

    public function index(Request $request)
    {
        $buscar=$request->busca;

        $usuarios = DB::table('users')
        ->join('tipousers', 'tipousers.id', '=', 'users.tipouser_id')
        ->join('personas', 'personas.id', '=', 'users.persona_id')

/*         ->leftjoin('programaestudios', 'programaestudios.id', '=', 'users.programaestudio_id') */

        ->where('users.borrado','0')
        ->where(function($query) use ($buscar){
            $query->where('personas.dni','like','%'.$buscar.'%');
            $query->orWhere('users.name','like','%'.$buscar.'%');
        $query->orWhere('personas.apellidos','like','%'.$buscar.'%');
        $query->orWhere('personas.nombres','like','%'.$buscar.'%');
        $query->orWhere('users.email','like','%'.$buscar.'%');
            })
        ->orderBy('tipousers.id')
        ->orderBy('personas.apellidos')
        ->orderBy('personas.nombres')
        ->orderBy('users.name')
        ->select('users.id as id','users.name','users.email','users.activo','users.borrado','users.persona_id','users.tipouser_id', 'users.programaestudio_id',
        'personas.id as idpersona','personas.dni','personas.apellidos','personas.nombres','personas.telefono','personas.direccion','personas.cargo',
        'tipousers.id as idtipouser','tipousers.nombre as tipouser'
/*         DB::Raw("IFNULL( `programaestudios`.`id` , '0' ) as idprogramaestudios"),
        DB::Raw("IFNULL( `programaestudios`.`nombre` , '' ) as programaestudio"), */
        )
        ->paginate(30);

        foreach ($usuarios as $key => $dato) {   
            
            $permisos1= Permiso::where('user_id',$dato->id)->where('nivel', 0)->orderBy('id')->get();

            $permisos2=  DB::table('permisos')
            ->join('facultads', 'facultads.id', '=', 'permisos.facultad_id')
            ->where('permisos.user_id', $dato->id)
            ->where('permisos.nivel', 1)
            ->orderBy('facultads.nombre')
            ->select('permisos.id',
                'permisos.facultad_id',
                'permisos.programaestudio_id',
                'permisos.nivel',
                'permisos.created_at',
                'permisos.updated_at',
                'permisos.roles',
                'permisos.user_id',
                'facultads.nombre as facultad',
                'facultads.id as idfacultad')
                ->get();

            $permisos3=  DB::table('permisos')
            ->join('programaestudios', 'programaestudios.id', '=', 'permisos.programaestudio_id')
            ->where('permisos.user_id', $dato->id)
            ->where('permisos.nivel', 2)
            ->orderBy('programaestudios.nombre')
            ->select('permisos.id',
                'permisos.facultad_id',
                'permisos.programaestudio_id',
                'permisos.nivel',
                'permisos.created_at',
                'permisos.updated_at',
                'permisos.roles',
                'permisos.user_id',
                'programaestudios.nombre as programa',
                'programaestudios.id as idPrograma')
                ->get();


            $rolmodulos= DB::table('rolmodulos')
            ->join('modulos', 'modulos.id', '=', 'rolmodulos.modulo_id')
            ->where('rolmodulos.user_id', $dato->id)
            ->orderBy('modulos.nivel')
            ->orderBy('modulos.id')
            ->orderBy('rolmodulos.id')
            ->select('rolmodulos.id',
            'rolmodulos.user_id',
            'rolmodulos.modulo_id',
            'rolmodulos.rolessub',
            'modulos.modulo',
            'modulos.nivel',
            'rolmodulos.facultad_id',
            'rolmodulos.programaestudio_id')
            ->get();

            $rolsubmodulos= DB::table('rolsubmodulos')
            ->join('submodulos', 'submodulos.id', '=', 'rolsubmodulos.submodulo_id')
            ->where('rolsubmodulos.user_id', $dato->id)
            ->orderBy('rolsubmodulos.nivel')
            ->orderBy('submodulos.id')
            ->orderBy('rolsubmodulos.id')
            ->select('rolsubmodulos.id',
            'rolsubmodulos.nivel',
            'rolsubmodulos.modulo_id',
            'rolsubmodulos.submodulo_id',
            'rolsubmodulos.user_id',
            'submodulos.submodulo',
            'submodulos.modulo_id as idmodulo',
            'rolsubmodulos.facultad_id',
            'rolsubmodulos.programaestudio_id')
            ->get();



            
            //$rolsubmodulos = Rolsubmodulo::where('user_id',$dato->id)->orderBy('id')->get();

            $dato->permisos1 = $permisos1;
            $dato->permisos2 = $permisos2;
            $dato->permisos3 = $permisos3;
            $dato->rolmodulos = $rolmodulos;
            $dato->rolsubmodulos = $rolsubmodulos;

        }

        
        /*
        $users=$usuarios->items();



        foreach ($users as $key => $dato) {

            $permod=DB::table('permisomodulos')
            ->join('modulos', 'modulos.id', '=', 'permisomodulos.modulo_id')
            ->where('permisomodulos.activo','1')
            ->where('permisomodulos.borrado','0')
            ->where('permisomodulos.user_id',$dato->id)
            ->select('permisomodulos.id','permisomodulos.modulo_id','permisomodulos.user_id','permisomodulos.tipo','modulos.id as idmodulo','modulos.modulo')
            ->get();

            foreach ($permod as $key2 => $dato2) {

            $newobj = new stdClass();

            $newobj->id=$dato2->id;
            $newobj->modulo_id=$dato2->modulo_id;
            $newobj->user_id=$dato2->user_id;
            $newobj->tipo=$dato2->tipo;
            $newobj->idmodulo=$dato2->idmodulo;
            $newobj->modulo=$dato2->modulo;

            $permisoModulos[]=$newobj;

            }


            $persubmod=DB::table('permisossubmodulos')
            ->join('submodulos', 'submodulos.id', '=', 'permisossubmodulos.submodulo_id')
            ->where('permisossubmodulos.activo','1')
            ->where('permisossubmodulos.borrado','0')
            ->where('permisossubmodulos.user_id',$dato->id)
            ->select('permisossubmodulos.id','permisossubmodulos.submodulo_id','permisossubmodulos.user_id','submodulos.id as idsubmodulo','submodulos.submodulo','submodulos.modulo_id')
            ->get();

            foreach ($persubmod as $key3 => $dato3) {

                $newobj2 = new stdClass();
    
                $newobj2->id=$dato3->id;
                $newobj2->submodulo_id=$dato3->modulo_id;
                $newobj2->user_id=$dato3->user_id;
                $newobj2->modulo_id=$dato3->modulo_id;
                $newobj2->idsubmodulo=$dato3->idsubmodulo;
                $newobj2->submodulo=$dato3->submodulo;
    
                $permisoSubModulos[]=$newobj2;
    
                }
        }*/

          return [
            'pagination'=>[
                'total'=> $usuarios->total(),
                'current_page'=> $usuarios->currentPage(),
                'per_page'=> $usuarios->perPage(),
                'last_page'=> $usuarios->lastPage(),
                'from'=> $usuarios->firstItem(),
                'to'=> $usuarios->lastItem(),
            ],
            'usuarios'=>$usuarios
        ];
    }



    public function miperfil(Request $request)
    {
        //$buscar=$request->busca;

      /*  $usuario = DB::table('users')
        ->join('tipousers', 'tipousers.id', '=', 'users.tipouser_id')
        ->join('personas', 'personas.id', '=', 'users.persona_id')
        ->join('tipopersonas', 'tipopersonas.id', '=', 'personas.tipopersona_id')
        ->leftjoin('entidads', 'entidads.id', '=', 'users.entidad_id')
        ->where('users.id',Auth::user()->id)

        ->orderBy('users.id')
        ->select('users.id as idUser','users.name as username','users.email','users.activo','users.borrado','personas.id as idPer','personas.nombre','personas.dni_ruc','personas.direccion','tipousers.id as idtipouser','tipousers.tipo as tipouser','tipousers.codigo','tipopersonas.tipo as tipoPer','tipopersonas.id as idtipoPer','entidads.id as entidad_id', 'entidads.descripcion as entidad','entidads.code as codeentidad')
        ->first();*/

        $usuario = DB::table('users')
        ->join('tipousers', 'tipousers.id', '=', 'users.tipouser_id')
        ->join('personas', 'personas.id', '=', 'users.persona_id')
        ->leftjoin('programaestudios', 'programaestudios.id', '=', 'users.programaestudio_id')
        ->where('users.id',Auth::user()->id)
        ->select('users.id as id','users.name','users.email','users.activo','users.borrado','users.persona_id','users.tipouser_id', 'users.programaestudio_id',
        'personas.id as idpersona','personas.dni','personas.apellidos','personas.nombres','personas.telefono','personas.direccion','personas.cargo',
        'tipousers.id as idtipouser','tipousers.nombre as tipouser',
        DB::Raw("IFNULL( `programaestudios`.`id` , '0' ) as idprogramaestudios"),
        DB::Raw("IFNULL( `programaestudios`.`nombre` , '' ) as programaestudio"),
        )
        ->first();




        return [
            'usuario'=>$usuario
        ];
    }

    public function modificarclave(Request $request)
    {
        $result='1';
        $msj='';
        $selector='';

        $pswa=$request->pswa;
        $pswn1=$request->pswn1;
        $pswn2=$request->pswn2;

        $iduser=Auth::user()->id;
     

        $input1  = array('clave' => $pswa);
        $reglas1 = array('clave' => 'required');

        $input2  = array('ncalve1' => $pswn1);
        $reglas2 = array('ncalve1' => 'required');

        $input3  = array('ncalve2' => $pswn2);
        $reglas3 = array('ncalve2' => 'required');



        //$input6  = array('carrera' => $newCarrerasunasam);
       // $reglas6 = array('carrera' => 'required');

        // Segunda Carrera OP chekiar $newcarrera_id2

         $validator1 = Validator::make($input1, $reglas1);
         $validator2 = Validator::make($input2, $reglas2);
         $validator3 = Validator::make($input3, $reglas3);


          if ($validator1->fails())
        {
            $result='0';
            $msj='Ingrese la Contraseña Actual de la Cuenta';
            $selector='txtdato2';
        }elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese la Nueva Contraseña de la Cuenta';
            $selector='txtdato3';
        }elseif ($validator3->fails()) {
            $result='0';
            $msj='Ingrese nuevamente la Nueva Contraseña de la Cuenta';
            $selector='txtdato4';
        }elseif (!Hash::check($pswa, Auth::user()->password)) {
            $result='0';
            $msj='La Contraseña Actual Ingresada No es Correcta, Ingrése una Contraseña Correcta';
            $selector='txtdato2';
        }elseif (strval($pswn1)!=strval($pswn2)) {
            $result='0';
            $msj='Las Nuevas Contraseñas Indicadas son Diferentes, Por favor Ingrese Correctamente las Contraseñas';
            $selector='txtdato3';
        }elseif (Hash::check($pswn1, Auth::user()->password)) {
            $result='0';
            $msj='La Contraseña Actual y La Nueva Contraseña Son Iguales, Debe Ingresar una Nueva Contraseña Diferente';
            $selector='txtdato3';
        }
        else{

            $editUser = User::findOrFail($iduser);
            $editUser->password=bcrypt($pswn1);          
            $editUser->save();


            $msj='Contraseña de Usuario modificado con éxito';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);
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
        $result='1';
        $msj='';
        $selector='';

        $name=$request->name;
        $email=$request->email;
        $activo=$request->activo;
        $persona_id=$request->persona_id;
        $tipouser_id=$request->tipouser_id;
        $dni=$request->dni;
        $apellidos=$request->apellidos;
        $nombres=$request->nombres;
        $telefono=$request->telefono;
        $direccion=$request->direccion;
        $cargo=$request->cargo;
        $password=$request->password;
        $facultad_id=$request->facultad_id;
        $programaestudio_id=$request->programaestudio_id;

        if(intval($tipouser_id) < 4)
        {
            $facultad_id = 0;
            $programaestudio_id = 0;
        }

        
        $regla0=DB::table('users')
        ->join('personas', 'personas.id', '=', 'users.persona_id')
        ->where('users.borrado','0')
        ->where('users.tipouser_id',$tipouser_id)
        ->where('personas.dni',$dni)->count();

        $regla02=User::where('name',$name)->where('borrado','0')->count();
        $regla03=User::where('email',$email)->where('borrado','0')->count();


        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required');

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');

        $input4  = array('cargo' => $cargo);
        $reglas4 = array('cargo' => 'required');

        $input5  = array('email' => $email);
        $reglas5 = array('email' => 'required');

        $input6  = array('name' => $name);
        $reglas6 = array('name' => 'required');

        $input7  = array('password' => $password);
        $reglas7 = array('password' => 'required');



        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);
        $validator6 = Validator::make($input6, $reglas6);
        $validator7 = Validator::make($input7, $reglas7);


        if($regla0>0){
            $result='0';
            $msj='Ya se encuentra registrado un Usuario con ese tipo de Usuario y con el DNI ingresado';
            $selector='txtdni';
        }

        elseif($regla02>0){
            $result='0';
            $msj='Ya se encuentra registrado un Usuario con el Username ingresado';
            $selector='txtname';
        }

        elseif($regla03>0){
            $result='0';
            $msj='Ya se encuentra registrado un email con el Username ingresado';
            $selector='txtemail';
        }

        elseif ($validator1->fails())
        {
            $result='0';
            $msj='Complete el DNI del usuario';
            $selector='txtdni';

        }
        elseif (strlen($dni)<8)
        {
            $result='0';
            $msj='Complete un N° de DNI Válido, mínimo 08 dígitos';
            $selector='txtdni';

        }
        elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese los nombres del usuario';
            $selector='txtnombres';
        }
        elseif ($validator3->fails()) {
            $result='0';
            $msj='Ingrese los apellidos del usuario';
            $selector='txtapellidos';
        }
        elseif ($validator4->fails()) {
            $result='0';
            $msj='Ingrese el cargo del usuario';
            $selector='txtcargo';
        }
       
        elseif ($validator5->fails()) {
            $result='0';
            $msj='Ingrese el email del usuario';
            $selector='txtemail';
        }
        elseif ($validator6->fails()) {
            $result='0';
            $msj='Ingrese el Username del Usuario';
            $selector='txtname';
        }
        elseif ($validator7->fails()) {
            $result='0';
            $msj='Ingrese el Password del usuario';
            $selector='txtpassword';
        }
        elseif (intval($tipouser_id)==0) {
            $result='0';
            $msj='Seleccione el Tipo de Usuario';
            $selector='cbutipouser_id';
        }
        elseif (intval($facultad_id)==0 && intval($tipouser_id)==4) {
            $result='0';
            $msj='Seleccione la Facultad a Cargo del Usuario';
            $selector='cbufacultad_id';
        }
        elseif (intval($programaestudio_id)==0 && intval($tipouser_id)==5) {
            $result='0';
            $msj='Seleccione el Programa de Estudio a Cargo del Usuario';
            $selector='cbuprogramaestudio_id';
        }


       
            else{


                if(intval($persona_id)!=0)
                {
                    $editPersona =Persona::find($persona_id);
                    $editPersona->dni=$dni;
                    $editPersona->apellidos=$apellidos;
                    $editPersona->nombres=$nombres;
                    $editPersona->telefono=$telefono;
                    $editPersona->direccion=$direccion;
                    $editPersona->cargo=$cargo;

        
                    $editPersona->save();
                }
                else{
                    $newPersona = new Persona();
                    $newPersona->dni=$dni;
                    $newPersona->apellidos=$apellidos;
                    $newPersona->nombres=$nombres;
                    $newPersona->telefono=$telefono;
                    $newPersona->direccion=$direccion;
                    $newPersona->cargo=$cargo;
                    $newPersona->activo='1';
                    $newPersona->borrado='0';
        
                    $newPersona->save();
        
                    $persona_id=$newPersona->id;
                }
        
                    $newUser = new User();
                    $newUser->name=$name;
                    $newUser->email=$email;
                    $newUser->password=bcrypt($password);
                    $newUser->persona_id=$persona_id;
                    $newUser->tipouser_id=$tipouser_id;
                    $newUser->activo=$activo;
                    $newUser->borrado='0';                   

                    $newUser->save();

                    if($tipouser_id == 3)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = 0;
                        $newPermiso->programaestudio_id = 0;
                        $newPermiso->nivel = 0;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }
                    elseif($tipouser_id == 4)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = $facultad_id;
                        $newPermiso->programaestudio_id = 0;
                        $newPermiso->nivel = 1;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }
                    elseif($tipouser_id == 5)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = 0;
                        $newPermiso->programaestudio_id = $programaestudio_id;
                        $newPermiso->nivel = 2;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }
        
    

                    $msj='Nuevo Usuario del Sistema registrado con éxito';

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
        
        $result='1';
        $msj='';
        $selector='';

        $name=$request->name;
        $email=$request->email;
        $activo=$request->activo;
        $persona_id=$request->persona_id;
        $tipouser_id=$request->tipouser_id;
        $dni=$request->dni;
        $apellidos=$request->apellidos;
        $nombres=$request->nombres;
        $telefono=$request->telefono;
        $direccion=$request->direccion;
        $cargo=$request->cargo;
        $password=$request->password;
        $facultad_id=$request->facultad_id;
        $programaestudio_id=$request->programaestudio_id;

        if(intval($tipouser_id) < 4)
        {
            $facultad_id = 0;
            $programaestudio_id = 0;
        }

        $modifpassword=$request->modifpassword;

        $tipouser_id_ori=$request->tipouser_id_ori;




        
        $regla0=DB::table('users')
        ->join('personas', 'personas.id', '=', 'users.persona_id')
        ->where('users.tipouser_id',$tipouser_id)
        ->where('users.borrado','0')
        ->where('users.id','<>',$id)
        ->where('personas.dni',$dni)->count();

        $regla02=User::where('name',$name)->where('users.id','<>',$id)->where('borrado','0')->count();
        $regla03=User::where('email',$email)->where('users.id','<>',$id)->where('borrado','0')->count();

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required');

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');

        $input4  = array('cargo' => $cargo);
        $reglas4 = array('cargo' => 'required');

        $input5  = array('email' => $email);
        $reglas5 = array('email' => 'required');

        $input6  = array('name' => $name);
        $reglas6 = array('name' => 'required');

        $input7  = array('password' => $password);
        $reglas7 = array('password' => 'required');



        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);
        $validator6 = Validator::make($input6, $reglas6);
        $validator7 = Validator::make($input7, $reglas7);


        if($regla0>0){
            $result='0';
            $msj='Ya se encuentra registrado un Usuario con ese tipo de Usuario y con el DNI ingresado';
            $selector='txtdniE';
        }

        elseif($regla02>0){
            $result='0';
            $msj='Ya se encuentra registrado un Usuario con el Username ingresado';
            $selector='txtnameE';
        }

        elseif($regla03>0){
            $result='0';
            $msj='Ya se encuentra registrado un email con el Username ingresado';
            $selector='txtemailE';
        }

        elseif ($validator1->fails())
        {
            $result='0';
            $msj='Complete el DNI del usuario';
            $selector='txtdniE';

        }
        elseif (strlen($dni)<8)
        {
            $result='0';
            $msj='Complete un N° de DNI Válido, mínimo 08 dígitos';
            $selector='txtdniE';

        }
        elseif ($validator2->fails()) {
            $result='0';
            $msj='Ingrese los nombres del usuario';
            $selector='txtnombresE';
        }
        elseif ($validator3->fails()) {
            $result='0';
            $msj='Ingrese los apellidos del usuario';
            $selector='txtapellidosE';
        }
        elseif ($validator4->fails()) {
            $result='0';
            $msj='Ingrese el cargo del usuario';
            $selector='txtcargoE';
        }
       
        elseif ($validator5->fails()) {
            $result='0';
            $msj='Ingrese el email del usuario';
            $selector='txtemailE';
        }
        elseif ($validator6->fails()) {
            $result='0';
            $msj='Ingrese el Username del Usuario';
            $selector='txtnameE';
        }
        /* elseif ($validator7->fails()) {
            $result='0';
            $msj='Ingrese el Password del usuario';
            $selector='txtpassword';
        } */
        elseif (intval($tipouser_id)==0) {
            $result='0';
            $msj='Seleccione el Tipo de Usuario';
            $selector='cbutipouser_idE';
        }
        elseif (intval($facultad_id)==0 && intval($tipouser_id)==4 && $tipouser_id!=$tipouser_id_ori) {
            $result='0';
            $msj='Seleccione la Facultad a Cargo del Usuario';
            $selector='cbufacultad_idE';
        }
        elseif (intval($programaestudio_id)==0 && intval($tipouser_id)==5 && $tipouser_id!=$tipouser_id_ori) {
            $result='0';
            $msj='Seleccione el Programa de Estudio a Cargo del Usuario';
            $selector='cbuprogramaestudio_idE';
        }
 
        elseif ($validator7->fails() && intval($modifpassword)==1) {
            $result='0';
            $msj='Ingrese el Password del usuario';
            $selector='txtpasswordE';
        }

 
            else{

                    $editPersona =Persona::find($persona_id);
                    $editPersona->dni=$dni;
                    $editPersona->apellidos=$apellidos;
                    $editPersona->nombres=$nombres;
                    $editPersona->telefono=$telefono;
                    $editPersona->direccion=$direccion;
                    $editPersona->cargo=$cargo;
        
                    $editPersona->save();
             
                if(intval($modifpassword)==1){

                    $newUser = User::find($id);;
                    $newUser->name=$name;
                    $newUser->email=$email;
                    $newUser->password=bcrypt($password);
                    $newUser->persona_id=$persona_id;
                    $newUser->tipouser_id=$tipouser_id;
                    $newUser->activo=$activo;

                    $newUser->save();
                }
                else{
                    $newUser = User::find($id);;
                    $newUser->name=$name;
                    $newUser->email=$email;
                    $newUser->persona_id=$persona_id;
                    $newUser->tipouser_id=$tipouser_id;
                    $newUser->activo=$activo;

                    $newUser->save();
                }

                if($tipouser_id!=$tipouser_id_ori){

                    Rolmodulo::where('user_id',$id)->delete();
                    Rolsubmodulo::where('user_id',$id)->delete();
                    Permiso::where('user_id',$id)->delete();

                    if($tipouser_id == 3)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = 0;
                        $newPermiso->programaestudio_id = 0;
                        $newPermiso->nivel = 0;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }
                    elseif($tipouser_id == 4)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = $facultad_id;
                        $newPermiso->programaestudio_id = 0;
                        $newPermiso->nivel = 1;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }
                    elseif($tipouser_id == 5)
                    {
                        $newPermiso = new Permiso();
                        $newPermiso->facultad_id = 0;
                        $newPermiso->programaestudio_id = $programaestudio_id;
                        $newPermiso->nivel = 2;
                        $newPermiso->roles = 1;
                        $newPermiso->user_id = $newUser->id;

                        $newPermiso->save();
                    }

                }
                    

          $msj='Usuario modificado con éxito';


    }
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

        $borrarUsuario = User::findOrFail($id);
        //$task->delete();

        $borrarUsuario->borrado='1';

        $borrarUsuario->save();

        $msj='Usuario seleccionado eliminado exitosamente';


        return response()->json(["result"=>$result,'msj'=>$msj]);
    }

    public function altabaja($id,$estado)
    {
        $result='1';
        $msj='';
        $selector='';

        $updateUsuario = User::findOrFail($id);
        $updateUsuario->activo=$estado;
        $updateUsuario->save();

        if(strval($estado)=="0"){
            $msj='El Usuario fue Desactivado exitosamente';
        }elseif(strval($estado)=="1"){
            $msj='El Usuario fue Activado exitosamente';
        }

        return response()->json(["result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }


    public function verpersona($dni)
    {
       $persona=Persona::where('dni_ruc',$dni)->get();

       $id="0";
       $idUser="0";

        foreach ($persona as $key => $dato) {
          $id=$dato->id;
        }

        $user=User::where('persona_id',$id)->where('borrado','0')->get();

        foreach ($user as $key => $dato) {
            $idUser=$dato->id;
        }


      return response()->json(["persona"=>$persona, "id"=>$id, "user"=>$user , "idUser"=>$idUser]);

    }



    public function borrarpermiso(Request $request)
    {
        $result='1';
        $msj='';
        $selector='';

        $id=$request->id;
        $facultad_id=$request->facultad_id;
        $programaestudio_id=$request->programaestudio_id;
        $nivel=$request->nivel;
        $roles=$request->roles;
        $user_id=$request->user_id;

        if(intval($nivel) == 0){
            
            $rolmodulo = Rolmodulo::where('nivel',$nivel)->where('user_id',$user_id)->delete();
            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->delete();
            
        }elseif(intval($nivel) == 1){
            
            $rolmodulo = Rolmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('facultad_id',$facultad_id)->delete();
            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('facultad_id',$facultad_id)->delete();


        }elseif(intval($nivel) == 2){
            
            $rolmodulo = Rolmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('programaestudio_id',$programaestudio_id)->delete();
            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('programaestudio_id',$programaestudio_id)->delete();
        }

        $permiso = Permiso::find($id)->delete();

        $permisos1= Permiso::where('user_id',$user_id)->where('nivel', 0)->orderBy('id')->get();

            $permisos2=  DB::table('permisos')
            ->join('facultads', 'facultads.id', '=', 'permisos.facultad_id')
            ->where('permisos.user_id', $user_id)
            ->where('permisos.nivel', 1)
            ->orderBy('facultads.nombre')
            ->select('permisos.id',
                'permisos.facultad_id',
                'permisos.programaestudio_id',
                'permisos.nivel',
                'permisos.created_at',
                'permisos.updated_at',
                'permisos.roles',
                'permisos.user_id',
                'facultads.nombre as facultad',
                'facultads.id as idfacultad')
                ->get();

            $permisos3=  DB::table('permisos')
            ->join('programaestudios', 'programaestudios.id', '=', 'permisos.programaestudio_id')
            ->where('permisos.user_id', $user_id)
            ->where('permisos.nivel', 2)
            ->orderBy('programaestudios.nombre')
            ->select('permisos.id',
                'permisos.facultad_id',
                'permisos.programaestudio_id',
                'permisos.nivel',
                'permisos.created_at',
                'permisos.updated_at',
                'permisos.roles',
                'permisos.user_id',
                'programaestudios.nombre as programa',
                'programaestudios.id as idPrograma')
                ->get();



        return response()->json(["permisos1"=>$permisos1, "permisos2"=>$permisos2, "permisos3"=>$permisos3, "result"=>$result,'msj'=>$msj,'selector'=>$selector]);

    }

    public function borrarrolmodulo(Request $request)
    {
        $result='1';
        $msj='';
        $selector='';

        $id=$request->id;
        $facultad_id=$request->facultad_id;
        $programaestudio_id=$request->programaestudio_id;
        $nivel=$request->nivel;
        $user_id=$request->user_id;
        $modulo_id=$request->modulo_id;

        if(intval($nivel) == 0){
            
            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('modulo_id',$modulo_id)->delete();

        }elseif(intval($nivel) == 1){

            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('modulo_id',$modulo_id)->where('facultad_id',$facultad_id)->delete();

        }elseif(intval($nivel) == 2){

            $rolsubmodulo = Rolsubmodulo::where('nivel',$nivel)->where('user_id',$user_id)->where('modulo_id',$modulo_id)->where('programaestudio_id',$programaestudio_id)->delete();
        }

        $rolmodulo = Rolmodulo::find($id)->delete();

        $rolmodulos= DB::table('rolmodulos')
            ->join('modulos', 'modulos.id', '=', 'rolmodulos.modulo_id')
            ->where('rolmodulos.user_id', $dato->id)
            ->orderBy('rolmodulos.nivel')
            ->orderBy('modulos.id')
            ->orderBy('rolmodulos.id')
            ->select('rolmodulos.id',
            'rolmodulos.user_id',
            'rolmodulos.modulo_id',
            'rolmodulos.rolessub',
            'modulos.modulo',
            'modulos.id as idmodulo',
            'rolmodulos.nivel',
            'rolmodulos.facultad_id',
            'rolmodulos.programaestudio_id')
            ->get();

            $rolsubmodulos= DB::table('rolsubmodulos')
            ->join('submodulos', 'submodulos.id', '=', 'rolsubmodulos.submodulo_id')
            ->where('rolsubmodulos.user_id', $dato->id)
            ->orderBy('rolsubmodulos.nivel')
            ->orderBy('submodulos.id')
            ->orderBy('rolsubmodulos.id')
            ->select('rolsubmodulos.id',
            'rolsubmodulos.nivel',
            'rolsubmodulos.modulo_id',
            'rolsubmodulos.submodulo_id',
            'rolsubmodulos.user_id',
            'submodulos.submodulo',
            'submodulos.modulo_id as idmodulo',
            'rolsubmodulos.facultad_id',
            'rolsubmodulos.programaestudio_id')
            ->get();

            return response()->json(["rolmodulos"=>$rolmodulos, "rolsubmodulos"=>$rolsubmodulos, "result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }

    public function borrarrollsubmodulo(Request $request)
    {
        $result='1';
        $msj='';
        $selector='';

        $id=$request->id;
        $facultad_id=$request->facultad_id;
        $programaestudio_id=$request->programaestudio_id;
        $nivel=$request->nivel;
        $user_id=$request->user_id;
        $modulo_id=$request->modulo_id;
        $submodulo_id=$request->submodulo_id;

        $rolmodulo = Rolsubmodulo::find($id)->delete();

        
        $rolsubmodulos= DB::table('rolsubmodulos')
        ->join('submodulos', 'submodulos.id', '=', 'rolsubmodulos.submodulo_id')
        ->where('rolsubmodulos.user_id', $dato->id)
        ->orderBy('rolsubmodulos.nivel')
        ->orderBy('submodulos.id')
        ->orderBy('rolsubmodulos.id')
        ->select('rolsubmodulos.id',
        'rolsubmodulos.nivel',
        'rolsubmodulos.modulo_id',
        'rolsubmodulos.submodulo_id',
        'rolsubmodulos.user_id',
        'submodulos.submodulo',
        'submodulos.modulo_id as idmodulo',
        'rolsubmodulos.facultad_id',
        'rolsubmodulos.programaestudio_id')
        ->get();

        return response()->json(["rolsubmodulos"=>$rolsubmodulos, "result"=>$result,'msj'=>$msj,'selector'=>$selector]);
    }
}
