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
    Route::get('intranet/organigramaportal', 'UniversidadController@index2');
    Route::get('intranet/organigrama', 'FacultadController@index2');
    Route::get('intranet/bannerportal', 'BannerController@index0');
    Route::get('intranet/banner', 'BannerController@index1');
    Route::get('intranet/presentacionportal', 'PresentacionController@index0');
    Route::get('intranet/presentacion', 'PresentacionController@index1');
    Route::get('intranet/datosportal', 'UniversidadController@index1');
    Route::get('intranet/datosfacultad', 'FacultadController@index1');
    Route::get('intranet/noticiasportal', 'NoticiaController@index0');
    Route::get('intranet/noticias', 'NoticiaController@index1');
    Route::get('intranet/eventosportal', 'EventoController@index0');
    Route::get('intranet/eventos', 'EventoController@index1');
    Route::get('intranet/calendarioportal', 'ComunicadoController@index0');
    Route::get('intranet/comunicados', 'ComunicadoController@index1');
    Route::get('intranet/plataformaportal', 'PlataformaController@index0');
    Route::get('intranet/redessolicalesportal', 'RedsocialController@index0');
    Route::get('intranet/redessolicales', 'RedsocialController@index1');
    Route::get('intranet/linkinteresportal', 'LinkinteresController@index0');
    Route::get('intranet/linkinteres', 'LinkinteresController@index1');
    
    Route::get('intranet/historiaportal', 'HistoriaController@index0');
    Route::get('intranet/historia', 'HistoriaController@index1');
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

    Route::get('intranet/objetivosunasam', 'ObjetivoController@index0');
    Route::get('intranet/objetivos', 'ObjetivoController@index1');
    Route::get('intranet/estatuto', 'EstatutoController@index0');
    Route::get('intranet/licenciamiento', 'LicenciamientoController@index01');
    Route::get('intranet/acreditacion', 'LicenciamientoController@index02');
    Route::get('intranet/himno', 'ContenidoController@index01');
    Route::get('intranet/documentosnormativosportal', 'DocumentoController@index01');
    Route::get('intranet/informesportal', 'DocumentoController@index02');
    Route::get('intranet/documentosnormativos', 'DocumentoController@index1');
    
    Route::get('intranet/facultades', 'FacultadesController@index1');
    Route::get('intranet/programasprogesionales', 'ProgramasEstudiosController@index1');
    
    
    Route::get('intranet/configfacultad', 'FacultadController@index0');

    
    

    Route::resource('usuario','UserController');
    Route::resource('intranet/bannerre', 'BannerController');
    Route::resource('intranet/presentacionre', 'PresentacionController');
    Route::resource('intranet/datosportalre', 'UniversidadController');
    Route::resource('intranet/datosfacre', 'FacultadController');
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
    Route::resource('intranet/docentesfecre', 'DocentesfacultadController');
    Route::resource('intranet/bannerprogramare', 'BannerController');
    Route::resource('intranet/presentacionprogramare', 'PresentacionController');
    Route::resource('intranet/organigramaprogramare', 'OrganigramaController');
    Route::resource('intranet/datosprogramare', 'ProgramaestudioController');
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
    Route::get('intranet/docentesfecre/altabaja/{id}/{var}', 'DocentesfacultadController@altabaja');
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

    Route::post('usuario/borrarpermiso','UserController@borrarpermiso');
    Route::post('usuario/borrarrolmodulo','UserController@borrarrolmodulo');
    Route::post('usuario/borrarrollsubmodulo','UserController@borrarrollsubmodulo');
    Route::post('usuario/grabarcredenciales0','UserController@grabarcredenciales0');
    Route::post('usuario/grabarcredenciales1','UserController@grabarcredenciales1');
    Route::post('usuario/grabarcredenciales2','UserController@grabarcredenciales2');


    /*
    Route::get('semestres','SemestreController@index1');
    Route::get('locales','LocalController@index1');
    Route::get('facultades','FacultadController@index1');
    Route::get('escuelas','EscuelaController@index1');
    Route::get('departamentoacademicos','DepartamentoacademicoController@index1');
    Route::get('datosfacultad/{id}','DatosfacultadController@index1');
    Route::get('modalidadadmision','ModalidadadmisionController@index1');
    Route::get('postulantespregrado','PostulanteController@index1');
    Route::get('alumnospregrado','AlumnoController@index1');
    Route::get('alumnosegresadospregrado','AlumnoController@index2');
    Route::get('postulantespostgrado','PostulanteController@index2');
    Route::get('alumnospostgrado','AlumnoController@index3');
    Route::get('alumnosegresadospostgrado','AlumnoController@index4');
    Route::get('docentes','DocenteController@index1');
    Route::get('bachilleres','GraduadoController@index1');
    Route::get('titulados','GraduadoController@index2');
    Route::get('maestros','GraduadoController@index3');
    Route::get('doctores','GraduadoController@index4');
    Route::get('tesisinfo','TesisController@index1');
    Route::get('revistaspublicaciones','RevistapublicacionController@index1');
    Route::get('administrativos','AdministrativoController@index1');
    Route::get('locacionservicios','AdminlocacionController@index1');
    Route::get('beneficiarioscomedor','BeneficiarioscomedorController@index1');
    Route::get('beneficiariosgym','BeneficiariosgymController@index1');
    Route::get('beneficiariostalleresdeportivos','BeneficiariostalldeportivoController@index1');
    Route::get('pasantiasalumnos','PasantiaController@index1');
    Route::get('pasantiadocentes','PasantiaController@index2');
    Route::get('pasantiaadministrativos','PasantiaController@index3');
    Route::get('pasantiallegaron','PasantiaController@index4');
    Route::get('conveniosmarco','ConvenioController@index1');
    Route::get('conveniosespecificos','ConvenioController@index2');
    Route::get('convenioscolaboracion','ConvenioController@index3');
    Route::get('programassalud','ProgramassaludController@index1');
    Route::get('campadbu','ProgramassaludController@index2');
    Route::get('medicos/{idprogramasalud}','MedicoController@index1');
    Route::get('beneficiarios/{idprogramasalud}','BeneficiarioController@index1');
    Route::get('atencionsalud/{idprogramasalud}','AtencionController@index1');
    Route::get('proyectos','ProyectoController@index1');
    Route::get('eventosculturales','EventoculturalController@index1');
    Route::get('talleresparticipantes/{idprogramasalud}','TalleresparticipanteController@index1');
    Route::get('talleres','TallerController@index1');
    Route::get('participantes/{idtaller}','ParticipanteController@index1');
    Route::get('presentaciones/{idtaller}','PresentacionController@index1');
    Route::get('investigadores','InvestigadorController@index1');
    Route::get('investigaciones','InvestigacionController@index1');
    Route::get('usuarios','UserController@index1');
    Route::get('miperfil','UserController@index2');
    Route::get('condicion','CondicionsocioeconomicaController@index1');
    Route::get('actividades','ActividadesController@index1');
    Route::get('programacion','ProgramacionController@index1');
    Route::get('prorrogas','ProrrogaController@index1');
    
    
    Route::resource('semestre','SemestreController');
    Route::resource('local','LocalController');
    Route::resource('pais','PaiseController');
    Route::resource('facultad','FacultadController');
    Route::resource('escuela','EscuelaController');
    Route::resource('departamentoacademico','DepartamentoacademicoController');
    Route::resource('datosfacultad','DatosfacultadController');
    Route::resource('modadmision','ModalidadadmisionController');
    Route::resource('postulantes','PostulanteController');
    Route::resource('alumnopregrado','AlumnoController');
    Route::resource('docente','DocenteController');
    Route::resource('graduado','GraduadoController');
    
    Route::resource('administrativo','AdministrativoController');
    Route::resource('locacionservicio','AdminlocacionController');
    
    Route::resource('benefcomedor','BeneficiarioscomedorController');
    Route::resource('benefgym','BeneficiariosgymController');
    Route::resource('beneftalldep','BeneficiariostalldeportivoController');
    
    Route::resource('pasantia','PasantiaController');
    Route::resource('convenio','ConvenioController');
    
    Route::resource('programasalud','ProgramassaludController');
    Route::resource('medico','MedicoController');
    Route::resource('beneficiario','BeneficiarioController');
    Route::resource('atencion','AtencionController');
    Route::resource('proyecto','ProyectoController');
    Route::resource('evento','EventoculturalController');
    Route::resource('talleresparticipante','TalleresparticipanteController');
    Route::resource('taller','TallerController');
    Route::resource('participante','ParticipanteController');
    Route::resource('presentacion','PresentacionController');
    
    Route::resource('investigador','InvestigadorController');
    Route::resource('investigacions','InvestigacionController');
    
    Route::resource('usuario','UserController');
    Route::resource('permiso','PermisoController');
    Route::resource('detalleInvestigacion','DetalleinvestigacionController');
    Route::resource('publicacion','PublicacionController');
    Route::resource('tesisresource','TesisController');
    Route::resource('revistasPubli','RevistapublicacionController');
    Route::resource('autor','AutorController');

    Route::resource('condicioneconomica','CondicionsocioeconomicaController');
    Route::resource('actividad','ActividadesController');
    Route::resource('programacions','ProgramacionController');
    Route::resource('prorroga','ProrrogaController');
    
    
    
    
    
    Route::get('semestre/activar/{id}/{var}','SemestreController@activar');
    Route::get('local/altabaja/{id}/{var}','LocalController@altabaja');
    Route::get('local/cambiarPais/{var}','LocalController@cambiarPais');
    Route::get('local/cambiarDepartamento/{var}','LocalController@cambiarDepartamento');
    Route::get('local/cambiarProvincia/{var}','LocalController@cambiarProvincia');
    Route::get('facultad/altabaja/{id}/{var}','FacultadController@altabaja');
    Route::get('escuela/altabaja/{id}/{var}','EscuelaController@altabaja');
    Route::get('departamentoacademico/altabaja/{id}/{var}','DepartamentoacademicoController@altabaja');
    Route::get('modadmision/altabaja/{id}/{var}','ModalidadadmisionController@altabaja');
    Route::get('permisoDelete/{id1}/{id2}/{var}/{var2}','PermisoController@delete');

    Route::get('investigadores/obtenerDatos','InvestigadorController@obtenerDatos');
    Route::get('investigaciones/obtenerAutors/{var}','InvestigacionController@obtenerAutors');
    Route::get('investigaciones/obtenerPublicacion/{var}','InvestigacionController@obtenerPublicacion');
    Route::get('personas/obtenerDatos','PersonaController@obtenerDatos');
    Route::get('personas/obtenerAutors/{var}','PersonaController@obtenerAutors');

    Route::get('programacion/altabaja/{id}/{var}','ProgramacionController@altabaja');
    



    Route::post('persona/buscarDNI','PersonaController@buscarDNI');
    Route::get('postulantes/imprimirExcel/{var1}','PostulanteController@imprimirExcel');

    Route::get('usuario/altabaja/{id}/{var}','UserController@altabaja');
    Route::get('usuario/verpersona/{dni}','UserController@verpersona');
    Route::post('usuario/miperfil','UserController@miperfil');
    Route::post('usuario/modificarclave','UserController@modificarclave');


    Route::post('postulantespregrado/importardata','PostulanteController@importarArchivo');
    Route::post('alumnopregradoR/importardata1','AlumnoController@importarArchivo1');
    Route::post('alumnopregradoR/importardata2','AlumnoController@importarArchivo2');
    Route::post('postulantesR/importardata','PostulanteController@importarArchivo2');
    Route::post('alumnopostgradoR/importardata1','AlumnoController@importarArchivo3');
    Route::post('alumnopostgradoR/importardata2','AlumnoController@importarArchivo4');
    Route::post('docentes/importardata','DocenteController@importarArchivo');
    Route::post('bachiller/importardata1','GraduadoController@importarArchivo1');
    Route::post('titulado/importardata2','GraduadoController@importarArchivo2');
    Route::post('maestro/importardata3','GraduadoController@importarArchivo3');
    Route::post('doctor/importardata4','GraduadoController@importarArchivo4');
    Route::post('administrativoR/importardata1','AdministrativoController@importarArchivo1');
    Route::post('locacionservicioR/importardata1','AdminlocacionController@importarArchivo1');






    Route::get('postulantespregrado/exportarExcel','PostulanteController@descargarExcel');
    Route::get('docentes/exportarExcel','DocenteController@descargarExcel');
    Route::get('alumnopregradoR/exportarExcel','AlumnoController@descargarExcel');
    Route::get('alumnopregradoR/exportarExcel2','AlumnoController@descargarExcel2');
    Route::get('postulantesR/exportarExcel','PostulanteController@descargarExcel2');
    Route::get('alumnopostgradoR/exportarExcel','AlumnoController@descargarExcel3');
    Route::get('alumnopostgradoR/exportarExcel2','AlumnoController@descargarExcel4');
    Route::get('bachilleres/exportarExcel','GraduadoController@descargarExcel');
    Route::get('titulados/exportarExcel2','GraduadoController@descargarExcel2');
    Route::get('maestros/exportarExcel3','GraduadoController@descargarExcel3');
    Route::get('doctores/exportarExcel4','GraduadoController@descargarExcel4');
    Route::get('investigadores/exportarExcel','InvestigadorController@descargarExcel');
    Route::get('investigaciones/exportarExcel','InvestigacionController@descargarExcel');
    Route::get('tesisinfo/exportarExcel','TesisController@descargarExcel');
    Route::get('revistaspublicaciones/exportarExcel','RevistapublicacionController@descargarExcel');
    Route::get('administrativos/exportarExcel','AdministrativoController@descargarExcel');
    Route::get('locacionservicios/exportarExcel','AdminlocacionController@descargarExcel');
    Route::get('beneficiarioscomedor/exportarExcel','BeneficiarioscomedorController@descargarExcel');
    Route::get('beneficiariosgym/exportarExcel','BeneficiariosgymController@descargarExcel');
    Route::get('beneficiariostalleresdeportivos/exportarExcel','BeneficiariostalldeportivoController@descargarExcel');
    Route::get('programassalud/exportarExcel','ProgramassaludController@descargarExcel');
    Route::get('medicosR/exportarExcel','MedicoController@descargarExcel');
    Route::get('beneficiariosR/exportarExcel','BeneficiarioController@descargarExcel');
    Route::get('atencionsaludR/exportarExcel','AtencionController@descargarExcel');
    Route::get('campadbu/exportarExcel','ProgramassaludController@descargarExcel2');
    Route::get('proyectos/exportarExcel','ProyectoController@descargarExcel');
    Route::get('eventosculturales/exportarExcel','EventoculturalController@descargarExcel');
    Route::get('talleresparticipantesR/exportarExcel','TalleresparticipanteController@descargarExcel');
    Route::get('talleres/exportarExcel','TallerController@descargarExcel');
    Route::get('participantesR/exportarExcel','ParticipanteController@descargarExcel');
    Route::get('presentacionesR/exportarExcel','PresentacionController@descargarExcel');
    Route::get('conveniosmarco/exportarExcel','ConvenioController@descargarExcel');
    Route::get('conveniosespecificos/exportarExcel2','ConvenioController@descargarExcel2');
    Route::get('convenioscolaboracion/exportarExcel3','ConvenioController@descargarExcel3');
    Route::get('pasantiasalumnos/exportarExcel','PasantiaController@descargarExcel');
    Route::get('pasantiadocentes/exportarExcel2','PasantiaController@descargarExcel2');
    Route::get('pasantiaadministrativos/exportarExcel3','PasantiaController@descargarExcel3');
    Route::get('pasantiallegaron/exportarExcel4','PasantiaController@descargarExcel4');

    Route::get('semestres/exportarExcel','SemestreController@descargarExcel');
    Route::get('locales/exportarExcel','LocalController@descargarExcel');
    Route::get('facultades/exportarExcel','FacultadController@descargarExcel');
    Route::get('escuelas/exportarExcel','EscuelaController@descargarExcel');
    Route::get('departamentoacademicos/exportarExcel','DepartamentoacademicoController@descargarExcel');
    Route::get('modalidadadmision/exportarExcel','ModalidadadmisionController@descargarExcel');
    Route::get('condicion/exportarExcel','CondicionsocioeconomicaController@descargarExcel');
    Route::get('actividades/exportarExcel','ActividadesController@descargarExcel');*/
    
 
});
