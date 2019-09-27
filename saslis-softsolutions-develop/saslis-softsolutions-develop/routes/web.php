<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('pagina-principal');
});

/* Administrador */
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout.submit');
    /* Funciones de admin para el docente */
    Route::get('registrar-docente', 'AdminController@formularioRegistrarDocente')->name('docente.registrar');
    Route::post('registrar-docente', 'AdminController@registrarDocente')->name('docente.registrar.submit');
    Route::get('lista-de-docentes', 'AdminController@listarDocentes')->name('docente.lista');
    /* Funciones de admin para el auxiliar */
    Route::get('registrar-auxiliar', 'AdminController@formularioRegistrarAuxiliar')->name('auxiliar.registrar');
    Route::post('registrar-auxiliar', 'AdminController@registrarAuxiliar')->name('auxiliar.registrar.submit');
    Route::get('lista-de-auxiliares', 'AdminController@listarAuxiliares')->name('auxiliar.lista');
    /* Funciones de admin para el estudiante */
    Route::get('lista-de-estudiantes-registrados', 'AdminController@listarEstudiantesRegistrados')->name('estudiantes.registrados.lista');
    Route::get('lista-de-estudiantes-habilitados', 'AdminController@listarEstudiantesHabilitados')->name('estudiantes.habilitados');
    /* Importar estudiantes para habilitarlos al registro de materia */
    Route::post('importar-estudiantes', 'AdminController@importarEstudiantes')->name('estudiantes.importar');
    /* Funciones de admin para la materia */
    Route::get('registrar-materia', 'AdminController@formularioRegistrarMateria')->name('materia.registrar');
    Route::post('registrar-materia', 'AdminController@registrarMateria')->name('materia.registrar.submit');
    Route::get('lista-de-materias', 'AdminController@listaDeMaterias')->name('materia.lista');
    Route::get('lista-de-materias/materia/{codMateria}', 'AdminController@mostrarDetalles')->name('materia.detalles');
    /* Funciones de admin para grupo de laboratorio */
    Route::get('lista-de-grupos-laboratorio', 'AdminController@mostrarGruposDeLaboratorio')->name('grupolaboratorio.lista');
    Route::get('registrar-grupo-laboratorio', 'AdminController@formularioRegistrarGrupoLaboratorio')->name('grupolaboratorio.registrar');
    Route::post('registrar-grupo-laboratorio', 'AdminController@registrarGrupoLaboratorio')->name('grupolaboratorio.registrar.submit');
    Route::post('verificarDisponibilidad', 'AdminController@verificarDisponibilidadDeGrupo')->name('grupolaboatorio.disponibilidad');
    /* Funciones de admin para registrar un docente a una materia */
    Route::get('registrar-docente-materia/{codMateria}', 'AdminController@formularioRegistrarDocenteMateria')->name('docentemateria.registrar');
    Route::post('registrar-docente-materia', 'AdminController@registrarDocenteMateria')->name('docentemateria.registrar.submit');
    /* Funciones de admin para la gestion*/
    Route::get('registrar-gestion', 'AdminController@furmularioCrearGestion')->name('gestion.registrar');
    Route::post('registrar-gestion', 'AdminController@crearGestion')->name('gestion.registrar.submit');
    Route::get('lista-de-gestiones', 'AdminController@listarGestiones')->name('gestion.lista');
});

/* Docente */
Route::prefix('docente')->group(function () {
    Route::get('/', 'DocenteController@index')->name('docente.home');
    Route::get('login', 'Auth\DocenteLoginController@showLoginForm')->name('docente.login');
    Route::post('login', 'Auth\DocenteLoginController@login')->name('docente.login.submit');
    Route::post('logout', 'Auth\DocenteLoginController@logout')->name('docente.logout.submit');
    Route::post('codsis', 'AdminController@verificarCodSisDocente')->name('docente.validate.codsis');
    Route::post('email', 'AdminController@verificarEmailDocente')->name('docente.validate.email');
    /* Materias segun docente */
    Route::get('materias-habilitadas', 'DocenteController@listaDeMaterias')->name('docente.materia.lista');
    Route::get('materias-tomadas', 'DocenteController@mostrarMateriasAsignadas')->name('docente.materias.asignadas');
    /* Grupos de Laboratorio segun docente */
    Route::get('grupos-de-laboratorio', 'DocenteController@mostrarGruposDeLaboratorio')->name('docente.grupos.laboratorio');
    Route::get('materias-tomadas/{codMateria}/grupos-de-laboratorio/', 'DocenteController@mostrarGruposDeLaboratorioPorCodMateria')->name('docente.materia.grupos.laboratorio');
    Route::get('grupos-de-laboratorio/grupo/{idGrupoLab}', 'DocenteController@detallesDelGrupoLaboratorio')->name('docente.grupos.ver.grupo');
    /* Crear Sesion */
    Route::get('grupos-de-laboratorio/grupo/{idGrupoLab}/sesiones', 'DocenteController@verSesionesDelGrupoDeLaboratorio')->name('docente.grupos.laboratorio.sesiones');
    Route::post('grupos-de-laboratorio/grupo/sesiones/crear', 'DocenteController@crearSesionDelGrupoDeLaboratorio')->name('docente.grupos.laboratorio.sesiones.crear');
});

/* AUXILIAR */
Route::prefix('auxiliar')->group(function () {
    Route::get('/', 'AuxiliarController@index')->name('auxiliar.home');
    Route::get('login', 'Auth\AuxiliarLoginController@showLoginForm')->name('auxiliar.login');
    Route::post('login', 'Auth\AuxiliarLoginController@login')->name('auxiliar.login.submit');
    Route::post('logout', 'Auth\AuxiliarLoginController@logout')->name('docente.logout.submit');
    Route::post('email', 'AdminController@verificarEmailAuxiliar')->name('auxiliar.validate.email');
    Route::get('grupos-de-laboratorio', 'AuxiliarController@listaDeGruposDeLaboratorio')->name('auxiliar.gruposhabilitados.lista');
    Route::post('tomar-grupo', 'AuxiliarController@tomarGrupo')->name('auxiliar.gruposhabilitados.submit');
    Route::get('grupos-de-laboratorio-tomados', 'AuxiliarController@mostrarGruposTomados')->name('auxiliar.grupos.tomados');
});

/* Estudiante */
Route::prefix('estudiante')->group(function () {
    Route::get('/', 'EstudianteController@index')->name('estudiante.home');
    Route::get('registrar', 'EstudianteController@formularioRegistro')->name('estudiante.registrar');
    Route::post('registrar', 'EstudianteController@registrarEstudiante')->name('estudiante.registrar.submit');
    Route::get('login', 'Auth\EstudianteLoginController@showLoginForm')->name('estudiante.login');
    Route::post('login', 'Auth\EstudianteLoginController@login')->name('estudiante.login.submit');
    Route::post('logout', 'Auth\EstudianteLoginController@logout')->name('estudiante.logout.submit');
    Route::get('codsis', 'EstudianteController@verificarCodsis')->name('estudiante.validate.codsis');
    Route::get('email', 'EstudianteController@verificarEmail')->name('estudiante.validate.email');
    /* Materias que puede ver el estudiante */
    Route::get('materias-habilitadas', 'EstudianteController@listaDeMateriasHabilitadas')->name('estudiante.materia.lista');
    Route::post('inscribirse-a-materia', 'EstudianteController@incribirseAMateria')->name('estudiante.inscribirse.materia.submit');
    Route::get('materias-tomadas', 'EstudianteController@mostrarMateriasInscritas')->name('estudiante.materias.inscritas');
    /* Grupos que puede ver el estudiante */
    Route::get('grupos-habilitados', 'EstudianteController@listaDeGruposHabilitadas')->name('estudiante.gruposhabilitados.lista');
    Route::post('inscribirse-a-grupo', 'EstudianteController@incribirseAGrupo')->name('estudiante.gruposhabilitados.submit');
    Route::get('grupos-tomados', 'EstudianteController@mostrarGruposInscritos')->name('estudiante.gruposhabilitados.inscritos');
});

/* Materia */
Route::prefix('materia')->group(function () {
    Route::get('codmateria', 'MateriaController@verificarCodmateria');
    Route::get('nombre', 'MateriaController@verificarNombre');
});

/* Grupo Laboratorio */
Route::prefix('grupo-laboratorio')->group(function () {
    Route::get('lista', 'GrupoLaboratorioController@lista');    
});

/* Gestion */
Route::prefix('gestion')->group(function () {
    Route::get('nombre', 'GestionController@verificarNombre');
});