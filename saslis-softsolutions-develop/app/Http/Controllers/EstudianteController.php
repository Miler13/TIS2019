<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Materia;
use App\EstudiantesHabilitados;
use App\DocenteMateria;
use Illuminate\Support\Facades\DB;
use App\Docente;
use App\EstudianteMateria;
use Illuminate\Support\Facades\Auth;
use App\GrupoLaboratorio;
use App\EstudianteLaboratorio;

class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:estudiante')->except('formularioRegistro', 'registrarEstudiante', 'verificarCodsis', 'verificarEmail');
    }

    public function index()
    {
        return view('estudiante.estudiante-home');
    }

    /* Funciones que el estudiante puede ejecutar sin autenticacion */
    public function formularioRegistro()
    {
        return view('estudiante.estudiante-registrar');
    }

    public function registrarEstudiante(Request $request)
    {
        $codSis = trim($request->codsis);
        $nombres = trim($request->nombre);
        $apellidos = trim($request->apellidos);
        $email = trim($request->email);
        $pass = $request->password;

        $estudianteBuscado = Estudiante::find($codSis);
        if ($estudianteBuscado == null) {
            $estudiante = new Estudiante();
            $estudiante->codsis_est   = $codSis;
            $estudiante->nombre       = $nombres;
            $estudiante->apellidos = $apellidos;
            $estudiante->email = $email;
            $estudiante->password = bcrypt($pass);
            $estudiante->cargo = 'estudiante';

            $estudiante->save();
            return redirect('estudiante/login')->with('est_reg_successful', 'Estudiante registrado exitosamente');
        } else {
            return back()->withInput();
        }
    }

    public function verificarCodsis(Request $request)
    {
        $codsis = $request->codsis;
        $existe_correo = false;
        if (Estudiante::find($codsis)) {
            $existe_correo = true;
        }
        return response()->json(['existe_codsis' => $existe_correo]);
    }

    public function verificarEmail(Request $request)
    {
        $correo = $request->correo;
        $existe_codsis = false;
        $estudiante = Estudiante::where('email', $correo)->first();
        if ($estudiante) {
            $existe_codsis = true;
        }
        return response()->json(['existe_correo' => $existe_codsis]);
    }


    public function listaDeMateriasHabilitadas()
    {
        $codsisEst = Auth::user()->codsis_est;
        $materiasHabilitadas = EstudiantesHabilitados::where('codsis_est', $codsisEst)->get();
        $materias = [];
        foreach ($materiasHabilitadas as $materiaHabilitada) {
            $materiaActual = Materia::find($materiaHabilitada->cod_materia);
            $docenteMateriaActual = DB::table('docentes_materias')->select('id_doc_mat', 'codsis_doc', 'cod_materia')
                ->whereRaw('codsis_doc = ? and cod_materia = ?', [$materiaHabilitada->codsis_doc, $materiaHabilitada->cod_materia])->first();
            if ($docenteMateriaActual) {
                $materiaActual['nombre_docente'] =  Docente::find($docenteMateriaActual->codsis_doc)->nombre;
                $materiaActual['apellido_docente'] = Docente::find($docenteMateriaActual->codsis_doc)->apellidos;
                $materiaActual['email_docente'] = Docente::find($docenteMateriaActual->codsis_doc)->email;
                $materiaActual['id_doc_mat'] = $docenteMateriaActual->id_doc_mat;
            }
            array_push($materias, $materiaActual);
        }
        $data = [
            'materias' => $materias,
        ];
        return view('materia.materia-lista')->with('data', $data);
    }

    public function incribirseAMateria(Request $request)
    {
        $codsisEst = $request->codsis_est;
        $idDocMat = $request->id_doc_mat;
        $estudianteMateria = new EstudianteMateria();
        $estudianteMateria->codsis_est = $codsisEst;
        $estudianteMateria->id_doc_mat = $idDocMat;
        $estudianteMateria->save();
        if ($estudianteMateria->id_registro != null) {
            return redirect()->route('estudiante.materias.inscritas')->with('est_mat_successful', 'El estudiante se incribio correctamente a la materia');
        } else {
            return redirect()->route('estudiante.materias.inscritas')->with('est_mat_warning', 'No se pudo registrar el estudiante a la materia');
        }
    }

    public function mostrarMateriasInscritas()
    {
        $codsisEst = Auth::user()->codsis_est;
        $estudianteMaterias = EstudianteMateria::where('codsis_est', $codsisEst)->get();
        $materiasDelEstudiante = [];
        foreach ($estudianteMaterias as $estudianteMateria) {
            $docenteMateria = DocenteMateria::find($estudianteMateria->id_doc_mat);
            $materiaActual = Materia::find($docenteMateria->cod_materia);
            $docenteActual = Docente::find($docenteMateria->codsis_doc);
            $materiaActual['nombre_docente'] =  $docenteActual->nombre;
            $materiaActual['apellido_docente'] = $docenteActual->apellidos;
            $materiaActual['email_docente'] = $docenteActual->email;
            array_push($materiasDelEstudiante, $materiaActual);
        }
        $data = [
            'materias' => $materiasDelEstudiante,
        ];
        return view('estudiante.estudiante-materias-lista')->with('data', $data);
    }

    /* Inscribirse a grupo */
    public function listaDeGruposHabilitadas()
    {
        $codsisEst = Auth::user()->codsis_est;
        $estudianteMaterias = EstudianteMateria::where('codsis_est', $codsisEst)->get();
        $gruposLaboratorios = [];
        foreach ($estudianteMaterias as $estudianteMateria) {
            $docenteMateria = DocenteMateria::find($estudianteMateria->id_doc_mat);
            $grupoLaboratorio = GrupoLaboratorio::where([
                ['cod_materia', $docenteMateria->cod_materia],
                ['codsis_doc', $docenteMateria->codsis_doc],
            ])->get();
            if (sizeof($grupoLaboratorio) > 0) {
                foreach ($grupoLaboratorio as $grupo) {
                    array_push($gruposLaboratorios, $grupo);
                }
            }
        }
        $data = [
            'grupo_laboratorio' => $gruposLaboratorios,
        ];
        return view('grupo_laboratorio.grupo_laboratorio-lista')->with('data', $data);
    }

    public function incribirseAGrupo(Request $request)
    {
        $idGrupoLab = $request->id_grupo_lab;
        $codsisEst = $request->codsis_est;
        $estudianteGrupoLaboratorio = new EstudianteLaboratorio();
        $estudianteGrupoLaboratorio->id_grupo_lab = $idGrupoLab;
        $estudianteGrupoLaboratorio->codsis_est = $codsisEst;
        $estudianteGrupoLaboratorio->save();
        if ($estudianteGrupoLaboratorio->id_reg != null) {
            return redirect()->route('estudiante.gruposhabilitados.inscritos')->with('est_gruplab_successful', 'El estudiante se incribio correctamente al grupo de laboratorio');
        } else {
            return redirect()->route('estudiante.gruposhabilitados.inscritos')->with('est_gruplab_warning', 'No se pudo registrar el estudiante al grupo de laboratorio');
        }
    }

    public function mostrarGruposInscritos()
    {
        $codsisEst = Auth::user()->codsis_est;
        $estudiantesGrupoLab = EstudianteLaboratorio::where('codsis_est', $codsisEst)->get();
        $gruposLaboratorioEstudiante = [];
        foreach ($estudiantesGrupoLab as $estudianteGrupoLab) {
            $grupoLaboratorio = GrupoLaboratorio::find($estudianteGrupoLab->id_grupo_lab);
            if ($grupoLaboratorio != null) {
                array_push($gruposLaboratorioEstudiante, $grupoLaboratorio);
            }
        }
        $data = [
            'grupos_laboratorio' => $gruposLaboratorioEstudiante,
        ];
        return view('estudiante.estudiante-grupo-lab-lista')->with('data', $data);
    }
}
