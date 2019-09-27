<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Auxiliar;
use App\Materia;
use App\Horario;
use App\Laboratorio;
use Illuminate\Support\Facades\DB;
use App\GrupoLaboratorio;
use App\Grupo;
use App\DocenteMateria;
use App\Estudiante;
use Excel;
use App\EstudiantesHabilitados;
use App\Gest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admin-home');
    }

    /* Crear Gestion */
    public function furmularioCrearGestion()
    {
        return view('gestion.gestion-registrar');
    }

    public function crearGestion(Request $request)
    {
        $gestionSeleccionada = $request->gestion;
        $gestion = Gest::all();
        foreach ($gestion as $actual) {
            if ($actual->nombre_gestion != $gestionSeleccionada) {
                $gestion_id = DB::table('gestiones')->max('cod_gestion') + 1;
                $gestionActual = new Gest();
                $gestionActual->cod_gestion = $gestion_id;
                $gestionActual->nombre_gestion = $gestionSeleccionada;
                $gestionActual->save();
                return redirect('admin/lista-de-gestiones')->with('ges_reg_successful', 'Se creo la gestion exitosamente');
            }
        }
        return back()->withInput();
    }

    public function listarGestiones()
    {
        $gestiones = Gest::all();
        return view('gestion.gestion-lista')->with('gestiones', $gestiones);
    }

    /* Mostrar formulario, Registrar y Listar Docentes */
    public function formularioRegistrarDocente()
    {
        return view('docente.docente-registrar');
    }

    public function registrarDocente(Request $request)
    {
        $codSis = trim($request->codsis);
        $nombres = trim($request->nombre);
        $apellidos = trim($request->apellidos);
        $email = trim($request->email);
        $pass = $request->password;

        $docenteBuscado = Docente::find($codSis);
        if ($docenteBuscado == null) {
            $docente = new Docente();
            $docente->codsis_doc   = $codSis;
            $docente->nombre       = $nombres;
            $docente->apellidos = $apellidos;
            $docente->email = $email;
            $docente->password = bcrypt($pass);
            $docente->cargo = 'docente';
            $docente->activo = true;

            $docente->save();
            return redirect('admin/lista-de-docentes')->with('doc_reg_successful', 'Docente registrado exitosamente');
        } else {
            return back()->withInput();
        }
    }

    public function listarDocentes()
    {
        $docentes = Docente::all();
        return view('docente.docente-lista')->with('docentes', $docentes);
    }

    /* Mostrar formulario, Registrar y Listar Auxiliares */
    public function formularioRegistrarAuxiliar()
    {
        return view('auxiliar.auxiliar-registrar');
    }

    public function registrarAuxiliar(Request $request)
    {
        $nombres = trim($request->nombre);
        $apellidos = trim($request->apellidos);
        $email = trim($request->email);
        $pass = $request->password;

        $auxiliarBuscado = Auxiliar::where('email', $email)->first();
        if (!$auxiliarBuscado) {
            $auxiliar = new Auxiliar();
            $auxiliarId = DB::table('auxiliares')->max('id_auxiliar') + 1;
            $auxiliar->id_auxiliar = $auxiliarId;
            $auxiliar->nombre       = $nombres;
            $auxiliar->apellidos = $apellidos;
            $auxiliar->email = $email;
            $auxiliar->password = bcrypt($pass);
            $auxiliar->cargo = 'auxiliar';

            $auxiliar->save();
            return redirect('admin/lista-de-auxiliares')->with('aux_reg_successful', 'Auxiliar registrado exitosamente');
        } else {
            return back()->withInput();
        }
    }

    public function listarAuxiliares()
    {
        $auxiliares = Auxiliar::all();
        return view('auxiliar.auxiliar-lista')->with('auxiliares', $auxiliares);
    }

    /* Mostrar Estudiantes Registrados e Incritos en la materia */
    public function listarEstudiantesRegistrados()
    {
        $estudiantes = Estudiante::all();
        return view('estudiante.estudiantes-registrados-lista')->with('estudiantes', $estudiantes);
    }

    public function listarEstudiantesHabilitados()
    {
        $estudiantesHabilitados = EstudiantesHabilitados::all();
        $estudiantes = [];
        if (sizeof($estudiantesHabilitados) > 0) {
            foreach ($estudiantesHabilitados as $estudianteHabilitado) {
                $estudianteActualHabilitado = Estudiante::find($estudianteHabilitado->codsis_est);
                $materiaActual = Materia::find($estudianteHabilitado->cod_materia);
                $docenteAcutal = Docente::find($estudianteHabilitado->codsis_doc);
                $estudianteActualHabilitado['nombre_materia'] = $materiaActual->nombre;
                $estudianteActualHabilitado['nombre_docente'] = $docenteAcutal->nombre;
                $estudianteActualHabilitado['apellidos_docente'] = $docenteAcutal->apellidos;
                array_push($estudiantes, $estudianteActualHabilitado);
            }
        }
        // echo json_encode($estudiantes);
        return view('estudiante.estudiantes-habilitados')->with('estudiantes', $estudiantes);
    }

    public function importarEstudiantes(Request $request)
    {
        $this->validate($request, [
            'selecionar_archivo' => 'required',
        ]);
        $path = $request->file('selecionar_archivo')->getRealPath();
        $data = Excel::load($path)->get()[0];

        if ($data->count()) {
            foreach ($data as $key => $value) {
                $estudianteActual = EstudiantesHabilitados::where([
                    ['codsis_est', '=', $value->codsis_est],
                    ['cod_materia', '=', $value->cod_materia],
                    ['codsis_doc', '=', $value->codsis_doc]
                ])->first();
                if (!$estudianteActual) {
                    $arr[] = ['codsis_est' => $value->codsis_est, 'cod_materia' => $value->cod_materia, 'codsis_doc' => $value->codsis_doc];
                }
            }
            if (!empty($arr)) {
                EstudiantesHabilitados::insert($arr);
            }
        }
        return back()->with('success', 'Se inserto correctamente a los estudiantes habilitados.');
    }

    /* Mostrar formulario, Registrar y Listar de Materias */
    public function formularioRegistrarMateria()
    {
        return view('materia.materia-registrar');
    }

    public function mostrarDetalles($codMateria)
    {
        $materia = Materia::find($codMateria);
        $codigos = DocenteMateria::get();
        $docentesMateria = [];
        if (sizeof($codigos) > 0) {
            foreach ($codigos as $codigo) {
                if ($codigo->cod_materia == $codMateria) {
                    $docenteDeLaMateriaActual = Docente::find($codigo->codsis_doc);
                    array_push($docentesMateria, $docenteDeLaMateriaActual);
                }
            }
        }
        $data = [
            'cod_materia' => $codMateria,
            'nombre_materia' => $materia->nombre,
            'docentes' => $docentesMateria,
        ];
        return view('materia.materia-detalles')->with('data', $data);
    }

    public function registrarMateria(Request $request)
    {
        $codMateria = trim($request->codmateria);
        $nombre = trim($request->nombre);
        $materia = Materia::find($codMateria);
        if ($materia == null) {
            $materia = new Materia();
            $materia->cod_materia = $codMateria;
            $materia->nombre = $nombre;
            $materia->save();
            return redirect('admin/lista-de-materias')->with('mat_reg_successful', 'Materia registrada exitosamente');
        }
        return back()->withInput();
    }

    public function listaDeMaterias()
    {
        $data = [
            'materias' => Materia::get(),
            'docentes' => Docente::get(),
        ];
        return view('materia.materia-lista')->with('data', $data);
    }

    public function formularioRegistrarDocenteMateria($codMateria)
    {
        $codigosDocentesMateria = DB::table('docentes_materias')->where('cod_materia', $codMateria)->pluck('codsis_doc');
        $docentes = Docente::pluck('codsis_doc');
        $codigosDisponibles = [];
        $docentesDispo = [];
        foreach ($codigosDocentesMateria as $codigoDocente) {
            array_push($codigosDisponibles, (int)$codigoDocente);
        }
        if (sizeof($codigosDocentesMateria) == 0) {
            $docentesDisponibles = $docentes;
        } else {
            $docentesDisponibles = $docentes->diff($codigosDisponibles);
        }
        foreach ($docentesDisponibles as $codigoDisponible) {
            $docenteActual = Docente::find($codigoDisponible);
            array_push($docentesDispo, $docenteActual);
        }
        $data = [
            'materia' => Materia::find($codMateria),
            'docentes' => $docentesDispo,
        ];
        return view('materia.materia-registrar-docente')->with('data', $data);
    }

    /* Funcion de registrar Docente a Materia */
    public function registrarDocenteMateria(Request $request)
    {
        $codMateria = $request->codmateria;
        $docentesSeleccionados = $request->docentes;
        foreach ($docentesSeleccionados as $docente) {
            $position = strpos($docente, "-") + 2;
            $codSis = substr($docente, $position);
            $docenteMateria = new DocenteMateria();
            $docenteMateria->cod_materia = $codMateria;
            $docenteMateria->codsis_doc = $codSis;
            $docenteMateria->save();
        }
        return redirect('admin/lista-de-materias')->with('doc_mat_reg_successful', 'Docente(s) agregado(s) exitosamente a la materia');
    }

    /* Mostrar formulario y Registrar Grupos de Laboratorio */
    public function formularioRegistrarGrupoLaboratorio()
    {
        $docentes_materias = DocenteMateria::get();
        $materias = [];
        foreach ($docentes_materias as $docente_materia) {
            $docenteActual = Docente::find($docente_materia->codsis_doc);
            $materialActual = Materia::find($docente_materia->cod_materia);
            $materialActual['codsis_doc'] = $docenteActual->codsis_doc;
            $materialActual['nombre_docente'] = $docenteActual->nombre;
            $materialActual['apellidos'] = $docenteActual->apellidos;
            array_push($materias, $materialActual);
        }
        $data = [
            'materias' => $materias,
            'auxiliares' => Auxiliar::get(),
            'laboratorios' => Laboratorio::get(),
            'gestiones' => Gest::get(),
            'grupo' => DB::table('grupos')->max('numero_gr') + 1,
        ];
        return view('grupo_laboratorio.grupo_laboratorio-registrar')->with('data', $data);
    }

    public function registrarGrupoLaboratorio(Request $request)
    {
        $position_materia = strpos($request->materia, "-") - 1;
        $position_codsis_doc = strpos($request->materia, "|") + 2;
        $grupo_numero = DB::table('grupos')->max('numero_gr') + 1;
        $materia_seleccionada = substr($request->materia, 0, $position_materia);
        $docente_seleccionado = substr($request->materia, $position_codsis_doc);
        $nombre_docente = substr($request->materia, $position_materia + 3, ($position_codsis_doc - $position_materia) - 6);

        $laboratorio_selecionado = $request->laboratorio;
        $gestion_selecionada = $request->gestion;
        $dias_seleccionadas = $request->dias;
        /* Primero creamos el grupo */
        $grupo = new Grupo();
        $grupo->numero_gr = $grupo_numero;
        $grupo->save();
        /* Segundo creamos el horario, para obtener el id del horario creado */
        $horario = new Horario();
        $horario->hora_ini = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();
        /* Obtenemos el codigo de la materia por el nombre de la materia */
        $materia = DB::table('materias')->where('nombre', $materia_seleccionada)->first();
        $gestion = DB::table('gestiones')->where('nombre_gestion', $gestion_selecionada)->first();
        /* Obtenemos el id del auxiliar por el email del auxiliar */
        /* Obtenemos el numero de laboratorio */
        $grupo_laboratorio = new GrupoLaboratorio();
        $grupo_laboratorio->cod_materia = $materia->cod_materia;
        $grupo_laboratorio->codsis_doc = $docente_seleccionado;
        $grupo_laboratorio->id_horario = $horario->id_horario;
        $grupo_laboratorio->nombre_materia = $materia_seleccionada;
        $grupo_laboratorio->nombre_docente = $nombre_docente;
        $grupo_laboratorio->hora_ini = $request->hora_inicio;;
        $grupo_laboratorio->hora_fin = $request->hora_fin;
        $grupo_laboratorio->numero_lab = $laboratorio_selecionado;
        $grupo_laboratorio->cod_gestion = $gestion->cod_gestion;
        $grupo_laboratorio->dia = implode(',', $dias_seleccionadas);
        $grupo_laboratorio->numero_gr = $grupo_numero;
        $grupo_laboratorio->save();

        return redirect('admin/lista-de-grupos-laboratorio')->with('gru_lab_reg_successful', 'Grupo de Laboratorio creado exitosamente');
    }

    public function mostrarGruposDeLaboratorio()
    {
        $data = [
            'grupo_laboratorio' => GrupoLaboratorio::get(),
        ];
        return view('grupo_laboratorio.grupo_laboratorio-lista')->with('data', $data);
    }

    /* Validaciones para validar email Auxiliar */

    public function verificarEmailAuxiliar(Request $request)
    {
        $correo = $request->correo;
        $existe_correo = false;
        $aux = Auxiliar::where('email', $correo)->first();
        if ($aux) {
            $existe_correo = true;
        }
        return response()->json(['existe_correo' => $existe_correo]);
    }

    /* Validaciones para validar email y codsis Docente */
    public function verificarCodSisDocente(Request $request)
    {
        $codSis = $request->codsis;
        $existe_codsis = false;
        $docente = Docente::find($codSis);
        if ($docente) {
            $existe_codsis = true;
        }
        return response()->json(['existe_codsis' => $existe_codsis]);
    }

    public function verificarEmailDocente(Request $request)
    {
        $correo = $request->correo;
        $existe_correo = false;
        $docente = Docente::where('email', $correo)->first();
        if ($docente) {
            $existe_correo = true;
        }
        return response()->json(['existe_correo' => $existe_correo]);
    }

    public function verificarDisponibilidadDeGrupo(Request $request)
    {
        $dias = $request->dias;
        $horaInicio = $request->horaInicio;
        $horaFin = $request->horaFin;
        $laboratorio = $request->laboratorio;

        foreach ($dias as $dia) {
            $grupoLaboratorio = DB::table('grupo_laboratorio')->where([
                ['hora_ini', '=', $horaInicio],
                ['hora_fin', '=', $horaFin],
                ['numero_lab', '=', $laboratorio],
                ['dia', '=', $dia],
            ])->first();
            if ($grupoLaboratorio) {
                return response()->json(['horario_ocupado' => true]);
            }
        }
        return response()->json(['horario_ocupado' => false]);
    }
}
