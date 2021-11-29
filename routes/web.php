<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TODO: Acá se muestran las Rutas de la Web TODO:
/* Route::get('/', function () {
    return view('web/unasam/index');
    //return redirect('login');
}); */

//Rutas Portal Web UNASAM
Route::get('/','IndexWebController@index');
Route::get('historia','IndexWebController@historia');
Route::get('misionvision','IndexWebController@misionvision');
Route::get('rector','IndexWebController@rector');
Route::get('vicerrectoracademico','IndexWebController@vicerrectoracademico');
Route::get('vicerrectorinvestigacion','IndexWebController@vicerrectorinvestigacion');
Route::get('asambleauniversitaria','IndexWebController@asambleauniversitaria');
Route::get('concejouniversitario','IndexWebController@concejouniversitario');
Route::get('objetivos','IndexWebController@objetivos');
Route::get('estatuto','IndexWebController@estatuto');
Route::get('himno','IndexWebController@himno');
Route::get('acreditacion','IndexWebController@acreditacion');
Route::get('licenciamiento','IndexWebController@licenciamiento');
Route::get('presentacion','IndexWebController@presentacion');


Route::get('noticias','PublicacionWebController@noticias');
Route::get('eventos','PublicacionWebController@eventos');
Route::get('actividades','PublicacionWebController@actividades');

Route::get('noticia/{var}', 'PublicacionWebController@noticia');
Route::get('evento/{var}', 'PublicacionWebController@evento');
Route::get('actividad/{var}', 'PublicacionWebController@actividad');

Route::get('documentos','PublicacionWebController@documentos');
Route::get('informes','PublicacionWebController@informes');
Route::get('organigrama','IndexWebController@organigrama');


//Rutas Portal Web FACULTADES

Route::get('facultad/{var}','IndexFacultadWebController@index');
Route::get('facultad/presentacion/{var}','IndexFacultadWebController@presentacion');
Route::get('facultad/historia/{var}','IndexFacultadWebController@historia');
Route::get('facultad/misionvision/{var}','IndexFacultadWebController@misionvision');
Route::get('facultad/objetivos/{var}','IndexFacultadWebController@objetivos');
Route::get('facultad/organigrama/{var}','IndexFacultadWebController@organigrama');
Route::get('facultad/decano/{var}','IndexFacultadWebController@decano');
Route::get('facultad/consejofacultad/{var}','IndexFacultadWebController@consejofacultad');
Route::get('facultad/directores/{var}','IndexFacultadWebController@directores');
Route::get('facultad/director/{var1}/{var2}', 'IndexFacultadWebController@director');
Route::get('facultad/jefesdepartamentos/{var}','IndexFacultadWebController@jefesdepartamentos');
Route::get('facultad/jefedepartamento/{var1}/{var2}', 'IndexFacultadWebController@jefedepartamento');
Route::get('facultad/servicios/{var}','IndexFacultadWebController@servicios');
Route::get('facultad/documentos/{var}','PublicacionWebController@documentosFacultad');
Route::get('facultad/docentes/{var}','IndexFacultadWebController@docentes');



Route::get('facultad/{var}/noticias','PublicacionWebController@noticiasFacultad');
Route::get('facultad/{var}/eventos','PublicacionWebController@eventosFacultad');
Route::get('facultad/{var}/comunicados','PublicacionWebController@comunicadosFacultad');

Route::get('facultad/noticia/{var1}/{var2}', 'PublicacionWebController@noticiaFacultad');
Route::get('facultad/evento/{var1}/{var2}', 'PublicacionWebController@eventoFacultad');
Route::get('facultad/comunicado/{var1}/{var2}', 'PublicacionWebController@comunicadoFacultad');

Route::group(['middleware' => 'auth'], function () {


    Route::get('salir', function () {
        Auth::logout();
        return redirect('login');
    });


    Route::get('usuarios','UserController@index1');
    Route::get('miperfil','UserController@index2');

    Route::get('intranet/configportal', 'UniversidadController@index0');
    Route::get('intranet/configfacultad', 'FacultadController@index0');
    Route::get('intranet/configprograma', 'ProgramaestudioController@index0');

    Route::get('intranet/bannerportal', 'BannerController@index0');
    Route::get('intranet/banner', 'BannerController@index1');
    Route::get('intranet/bannerprograma', 'BannerController@index2');

    Route::get('intranet/presentacionportal', 'PresentacionController@index0');
    Route::get('intranet/presentacion', 'PresentacionController@index1');
    Route::get('intranet/presentacionprograma', 'PresentacionController@index2');
    
    Route::get('intranet/datosportal', 'UniversidadController@index1');
    Route::get('intranet/datosfacultad', 'FacultadController@index1');
    Route::get('intranet/datosprograma', 'ProgramaestudioController@index1');
    
    Route::get('intranet/noticiasportal', 'NoticiaController@index0');
    Route::get('intranet/noticias', 'NoticiaController@index1');
    Route::get('intranet/noticiasprograma', 'NoticiaController@index2');

    Route::get('intranet/eventosportal', 'EventoController@index0');
    Route::get('intranet/eventos', 'EventoController@index1');
    Route::get('intranet/eventosprograma', 'EventoController@index2');

    Route::get('intranet/calendarioportal', 'ComunicadoController@index0');
    Route::get('intranet/comunicados', 'ComunicadoController@index1');
    Route::get('intranet/comunicadosprograma', 'ComunicadoController@index2');

    Route::get('intranet/redessolicalesportal', 'RedsocialController@index0');
    Route::get('intranet/redessolicales', 'RedsocialController@index1');
    Route::get('intranet/redessolicalesprograma', 'RedsocialController@index2');

    Route::get('intranet/linkinteresportal', 'LinkinteresController@index0');
    Route::get('intranet/linkinteres', 'LinkinteresController@index1');
    Route::get('intranet/linkinteresprograma', 'LinkinteresController@index2');

    Route::get('intranet/organigramaportal', 'UniversidadController@index2');
    Route::get('intranet/organigrama', 'FacultadController@index2');
    Route::get('intranet/organigramaprograma', 'ProgramaestudioController@index2');

    Route::get('intranet/plataformaportal', 'PlataformaController@index0');
    
    Route::get('intranet/historiaportal', 'HistoriaController@index0');
    Route::get('intranet/historia', 'HistoriaController@index1');
    Route::get('intranet/historiaprograma', 'HistoriaController@index2');

    Route::get('intranet/misionvisionportal', 'MisionvisionController@index0');
    Route::get('intranet/misionvision', 'MisionvisionController@index1');

    Route::get('intranet/rector', 'OrganoController@index01');
    Route::get('intranet/vicerrectoracademico', 'OrganoController@index02');
    Route::get('intranet/vicerrectorinvestigacion', 'OrganoController@index03');
    Route::get('intranet/asambleauniversitaria', 'OrganoController@index04');
    Route::get('intranet/concejouniversitario', 'OrganoController@index05');
    Route::get('intranet/decanatura', 'OrganoController@index06');
    Route::get('intranet/consejofacultad', 'OrganoController@index07');
    Route::get('intranet/directores', 'OrganoController@index08');
    Route::get('intranet/departamentoacademico', 'DepartamentoacademicoController@index1');

    Route::get('intranet/docentesfacultad','DocenteController@index1');

    Route::get('intranet/objetivosunasam', 'ObjetivoController@index0');
    Route::get('intranet/objetivos', 'ObjetivoController@index1');

    Route::get('intranet/estatuto', 'EstatutoController@index0');
    Route::get('intranet/licenciamiento', 'LicenciamientoController@index01');
    Route::get('intranet/acreditacion', 'LicenciamientoController@index02');
    Route::get('intranet/servicios', 'LicenciamientoController@index03');

    Route::get('intranet/himno', 'ContenidoController@index01');
    Route::get('intranet/documentosnormativosportal', 'DocumentoController@index01');
    Route::get('intranet/informesportal', 'DocumentoController@index02');
    Route::get('intranet/documentosnormativos', 'DocumentoController@index1');
    Route::get('intranet/documentosnormativosprograma', 'DocumentoController@index2');
    
    Route::get('intranet/facultades', 'FacultadesController@index1');
    Route::get('intranet/programasprogesionales', 'ProgramasEstudiosController@index1');
    
      
    

    Route::resource('intranet/datosportalre', 'UniversidadController');
    Route::resource('intranet/datosfacre', 'FacultadController');
    Route::resource('intranet/datosprogramare', 'ProgramaestudioController');

    Route::resource('intranet/bannerre', 'BannerController');
    Route::resource('intranet/presentacionre', 'PresentacionController');
    

    Route::resource('intranet/noticiasre', 'NoticiaController');
    Route::resource('intranet/eventosre', 'EventoController');
    Route::resource('intranet/comunicadosre', 'ComunicadoController');
    Route::resource('intranet/plataformare', 'PlataformaController');
    Route::resource('intranet/redessolicalesre', 'RedsocialController');
    Route::resource('intranet/linkinteresre', 'LinkinteresController');

    Route::resource('intranet/historiare', 'HistoriaController');
    Route::resource('intranet/misionvisionre', 'MisionvisionController');
    Route::resource('intranet/organosre', 'OrganoController');
    Route::resource('intranet/objetivosre', 'ObjetivoController');
    Route::resource('intranet/estatutore', 'EstatutoController');
    Route::resource('intranet/docuemntoestatutore', 'DocumentoestatutoController');
    Route::resource('intranet/contenidosre', 'ContenidoController');
    Route::resource('intranet/licenciamientore', 'LicenciamientoController');
    Route::resource('intranet/documentore', 'DocumentoController');

    Route::resource('intranet/facultadesre', 'FacultadesController');
    Route::resource('intranet/programasprogesionalesre', 'ProgramasEstudiosController');

    Route::resource('intranet/politicasre', 'PoliticacalidadController');
    Route::resource('intranet/directoriore', 'DirectorioController');
    Route::resource('intranet/gestioncalidadre', 'GestioncalidadController');
    Route::resource('intranet/revistasre', 'RevistaController');
    Route::resource('intranet/basedatosre', 'AccesobasedatoController');
    Route::resource('intranet/antiplagiore', 'AntiplagioController');
    Route::resource('intranet/galeriare', 'GaleriaController');
    Route::resource('intranet/estudiantesfecre', 'EstudianteController');
    Route::resource('intranet/docentesfacre', 'DocenteController');
    Route::resource('intranet/bannerprogramare', 'BannerController');
    Route::resource('intranet/presentacionprogramare', 'PresentacionController');
    Route::resource('intranet/organigramaprogramare', 'OrganigramaController');
    Route::resource('intranet/estadisticosprogramare', 'DatoestadisticoController');
    Route::resource('intranet/historiaprogramare', 'HistoriaController');
    Route::resource('intranet/misionvisionprogramare', 'MisionvisionController');
    Route::resource('intranet/objetivosprogramare', 'ObjetivoController');
    Route::resource('intranet/perfilingresoprogramare', 'PerfileController');
    Route::resource('intranet/perfilegresoprogramare', 'PerfileController');
    Route::resource('intranet/competenciasprogramare', 'CompetenciaController');
    Route::resource('intranet/camposocupacionalesprogramare', 'CampoocupacionalController');
    Route::resource('intranet/planestudiosprogramare', 'PlanestudioController');
    Route::resource('intranet/gradosprogramare', 'GradotituloController');
    Route::resource('intranet/docentesprogramare', 'DocenteController');
    Route::resource('intranet/infraestructuraprogramare', 'InfraestructuraController');

    Route::resource('intranet/imagennoticiasre', 'ImagennoticiaController');
    Route::resource('intranet/imageneventosre', 'ImageneventoController');
    Route::resource('intranet/imagencomunicadosre', 'ImagencomunicadoController');
    Route::resource('intranet/imagenhistoriare', 'ImagenhistoriaController');
    Route::resource('intranet/departamentosre', 'DepartamentoacademicoController');

    Route::resource('usuario','UserController');

    Route::get('usuario/altabaja/{id}/{var}','UserController@altabaja');
    Route::get('usuario/verpersona/{dni}','UserController@verpersona');

    Route::get('intranet/bannerre/altabaja/{id}/{var}', 'BannerController@altabaja');
    Route::get('intranet/presentacionre/altabaja/{id}/{var}', 'PresentacionController@altabaja');
    Route::get('intranet/datosfecre/altabaja/{id}/{var}', 'FacultadController@altabaja');
    Route::get('intranet/noticiasre/altabaja/{id}/{var}', 'NoticiaController@altabaja');
    Route::get('intranet/eventosre/altabaja/{id}/{var}', 'EventoController@altabaja');
    Route::get('intranet/comunicadosre/altabaja/{id}/{var}', 'ComunicadoController@altabaja');
    Route::get('intranet/plataformare/altabaja/{id}/{var}', 'PlataformaController@altabaja');
    Route::get('intranet/redessolicalesre/altabaja/{id}/{var}', 'RedsocialController@altabaja');
    Route::get('intranet/linkinteresre/altabaja/{id}/{var}', 'LinkinteresController@altabaja');

    Route::get('intranet/historiare/altabaja/{id}/{var}', 'HistoriaController@altabaja');
    Route::get('intranet/misionvisionre/altabaja/{id}/{var}', 'MisionvisionController@altabaja');
    Route::get('intranet/organosre/altabaja/{id}/{var}', 'OrganoController@altabaja');
    Route::get('intranet/objetivosre/altabaja/{id}/{var}', 'ObjetivoController@altabaja');
    Route::get('intranet/estatutore/altabaja/{id}/{var}', 'EstatutoController@altabaja');
    Route::get('intranet/licenciamientore/altabaja/{id}/{var}', 'LicenciamientoController@altabaja');
    Route::get('intranet/documentore/altabaja/{id}/{var}', 'DocumentoController@altabaja');

    Route::get('intranet/facultadesre/altabaja/{id}/{var}', 'FacultadesController@altabaja');
    Route::get('intranet/programasprogesionalesre/altabaja/{id}/{var}', 'ProgramasEstudiosController@altabaja');

    Route::get('intranet/politicasre/altabaja/{id}/{var}', 'PoliticacalidadController@altabaja');
    Route::get('intranet/directoriore/altabaja/{id}/{var}', 'DirectorioController@altabaja');
    Route::get('intranet/gestioncalidadre/altabaja/{id}/{var}', 'GestioncalidadController@altabaja');
    Route::get('intranet/revistasre/altabaja/{id}/{var}', 'RevistaController@altabaja');
    Route::get('intranet/basedatosre/altabaja/{id}/{var}', 'AccesobasedatoController@altabaja');
    Route::get('intranet/antiplagiore/altabaja/{id}/{var}', 'AntiplagioController@altabaja');
    Route::get('intranet/galeriare/altabaja/{id}/{var}', 'GaleriaController@altabaja');
    Route::get('intranet/estudiantesfecre/altabaja/{id}/{var}', 'EstudianteController@altabaja');
    Route::get('intranet/docentesfacre/altabaja/{id}/{var}', 'DocenteController@altabaja');
    Route::get('intranet/bannerprogramare/altabaja/{id}/{var}', 'BannerController@altabaja');
    Route::get('intranet/presentacionprogramare/altabaja/{id}/{var}', 'PresentacionController@altabaja');
    Route::get('intranet/organigramaprogramare/altabaja/{id}/{var}', 'OrganigramaController@altabaja');
    Route::get('intranet/datosprogramare/altabaja/{id}/{var}', 'ProgramaestudioController@altabaja');
    Route::get('intranet/estadisticosprogramare/altabaja/{id}/{var}', 'DatoestadisticoController@altabaja');
    Route::get('intranet/historiaprogramare/altabaja/{id}/{var}', 'HistoriaController@altabaja');
    Route::get('intranet/misionvisionprogramare/altabaja/{id}/{var}', 'MisionvisionController@altabaja');
    Route::get('intranet/objetivosprogramare/altabaja/{id}/{var}', 'ObjetivoController@altabaja');
    Route::get('intranet/perfilingresoprogramare/altabaja/{id}/{var}', 'PerfileController@altabaja');
    Route::get('intranet/perfilegresoprogramare/altabaja/{id}/{var}', 'PerfileController@altabaja');
    Route::get('intranet/competenciasprogramare/altabaja/{id}/{var}', 'CompetenciaController@altabaja');
    Route::get('intranet/camposocupacionalesprogramare/altabaja/{id}/{var}', 'CampoocupacionalController@altabaja');
    Route::get('intranet/planestudiosprogramare/altabaja/{id}/{var}', 'PlanestudioController@altabaja');
    Route::get('intranet/gradosprogramare/altabaja/{id}/{var}', 'GradotituloController@altabaja');
    Route::get('intranet/docentesprogramare/altabaja/{id}/{var}', 'DocenteController@altabaja');
    Route::get('intranet/infraestructuraprogramare/altabaja/{id}/{var}', 'InfraestructuraController@altabaja');
    Route::get('intranet/departamentosre/altabaja/{id}/{var}', 'DepartamentoacademicoController@altabaja');


    Route::delete('intranet/licenciamientore/deleteimg/{id}', 'LicenciamientoController@deleteImg');
    Route::delete('intranet/licenciamientore/deletefile/{id}', 'LicenciamientoController@deleteFile');


    Route::post('usuario/miperfil','UserController@miperfil');
    Route::post('usuario/modificarclave','UserController@modificarclave');

    Route::post('persona/buscarDNI','PersonaController@buscarDNI');

    Route::post('intranet/datosportalre/configuracion','UniversidadController@configuracion');
    Route::post('intranet/datosportalre/logo','UniversidadController@logo');
    Route::post('intranet/datosportalre/organigrama','UniversidadController@organigrama');

    Route::post('intranet/datosfacre/configuracion','FacultadController@configuracion');
    Route::post('intranet/datosfacre/logo','FacultadController@logo');
    Route::post('intranet/datosfacre/organigrama','FacultadController@organigrama');

    Route::post('intranet/datosprogramare/configuracion','ProgramaestudioController@configuracion');
    Route::post('intranet/datosprogramare/logo','ProgramaestudioController@logo');
    Route::post('intranet/datosprogramare/organigrama','ProgramaestudioController@organigrama');

    Route::post('usuario/borrarpermiso','UserController@borrarpermiso');
    Route::post('usuario/borrarrolmodulo','UserController@borrarrolmodulo');
    Route::post('usuario/borrarrollsubmodulo','UserController@borrarrollsubmodulo');
    Route::post('usuario/grabarcredenciales0','UserController@grabarcredenciales0');
    Route::post('usuario/grabarcredenciales1','UserController@grabarcredenciales1');
    Route::post('usuario/grabarcredenciales2','UserController@grabarcredenciales2');

    
 
});
