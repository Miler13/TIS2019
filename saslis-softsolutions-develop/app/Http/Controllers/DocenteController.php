<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Docente;
use Illuminate\Support\Facades\Auth;
use App\DocenteMateria;
use App\GrupoLaboratorio;
use App\AuxiliarLaboratorio;
use App\Auxiliar;
use App\Gest;
use App\EstudianteLaboratorio;
use App\Estudiante;
use App\Sesion;
use App\NumeroSesion;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:docente');
    }

    public function index()
    {
        return view('docente.docente-home');
    }

    /* Materias segun Docente */
    public function listaDeMaterias()
    {
        $data = [
            'materias' => Materia::all(),
        ];
        return view('materia.materia-lista')->with('data', $data);
    }

    public function mostrarMateriasAsignadas()
    {
        $codSisDocente = Auth::user()->codsis_doc;
        $docentesMateria = DocenteMateria::where('codsis_doc', $codSisDocente)->get();
        $materiasDelDocente = [];
        foreach ($docentesMateria as $docenteMateria) {
            $materialActual = Materia::find($docenteMateria->cod_materia);
            $materialActual['docente'] = Auth::user()->nombre;
            $materialActual['docente_apellidos'] = Auth::user()->apellidos;
            array_push($materiasDelDocente, $materialActual);
        }
        $data = [
            'materias' => $materiasDelDocente,
        ];
        return view('docente.docente-materias-asignadas')->with('data', $data);
    }

    /* Grupos de Laboratorio segun Docente */
    public function mostrarGruposDeLaboratorio()
    {
        $codSisDocente = Auth::user()->codsis_doc;
        $gruposLaboratorioDelDocente = GrupoLaboratorio::where('codsis_doc', $codSisDocente)->get();
        $data = [
            'grupos_laboratorio' => $gruposLaboratorioDelDocente,
        ];
        return view('docente.docente-grupos-laboratorio')->with('data', $data);
    }

    public function mostrarGruposDeLaboratorioPorCodMateria($codMateria)
    {
        $codSisDocente = Auth::user()->codsis_doc;
        $gruposLaboratorioDelDocentePorMateria = GrupoLaboratorio::where([
            ['codsis_doc', '=', $codSisDocente],
            ['cod_materia', '=', $codMateria],
        ])->get();
        $data = [
            'nombre_materia' => Materia::find($codMateria)->nombre,
            'grupos_laboratorio' => $gruposLaboratorioDelDocentePorMateria,
        ];
        return view('docente.docente-materia-grupos-laboratorio')->with('data', $data);
    }

    public function detallesDelGrupoLaboratorio($idGrupoLab)
    {
        $grupoLaboratorio = GrupoLaboratorio::find($idGrupoLab);
        $auxiliarGrupo = AuxiliarLaboratorio::where('id_grupo_lab', $idGrupoLab)->first();
        $grupoLab = [];
        array_push($grupoLab, $grupoLaboratorio);
        $estudiantesGrupo = EstudianteLaboratorio::where('id_grupo_lab', $idGrupoLab)->get();
        $estudiantesDelGrupo = [];
        if ($estudiantesGrupo) {
            foreach ($estudiantesGrupo as $estudianteGrupo) {
                $estudianteActual = Estudiante::find($estudianteGrupo->codsis_est);
                array_push($estudiantesDelGrupo, $estudianteActual);
            }
        }
        if ($auxiliarGrupo) {
            $auxiliar = Auxiliar::find($auxiliarGrupo->id_auxiliar);
            $data = [
                'id_grupo_lab' => $idGrupoLab,
                'grupo_laboratorio' => $grupoLab,
                'gestion' => Gest::find($grupoLaboratorio->cod_gestion),
                'docente' => Docente::find($grupoLaboratorio->codsis_doc),
                'auxiliar' => $auxiliar,
                'estudiantes' => $estudiantesDelGrupo,
            ];
            return view('docente.docente-grupo-laboratorio-detalles')->with('data', $data);
        } else {
            $data = [
                'id_grupo_lab' => $idGrupoLab,
                'grupo_laboratorio' => $grupoLab,
                'gestion' => Gest::find($grupoLaboratorio->cod_gestion),
                'docente' => Docente::find($grupoLaboratorio->codsis_doc),
                'auxiliar' => 'No',
                'estudiantes' => $estudiantesDelGrupo,
            ];
            return view('docente.docente-grupo-laboratorio-detalles')->with('data', $data);
        }
    }

    /* Crear Listar y Detalles del sesiones del grupo de laboratorio */
    public function verSesionesDelGrupoDeLaboratorio($idGrupoLab)
    {
        $sesiones = Sesion::where('id_grupo_lab', $idGrupoLab)->get();
        $grupoLab = GrupoLaboratorio::find($idGrupoLab);
        $data = [
            'sesion_numero' => sizeof($sesiones) + 1,
            'grupo_lab' => $grupoLab,
            'sesiones' => $sesiones,
        ];
        return view('sesion.sesion-grupo-laboratorio-sesiones')->with('data', $data);
    }

    public function crearSesionDelGrupoDeLaboratorio(Request $request)
    {
        $idGrupoLab = $request->idGrupoLab;
        $fecha = $request->fechaSesion;
        $numSesion = new NumeroSesion();
        $numSesion->num_sesion = $request->numSesion;
        $numSesion->save();
        $sesion = new Sesion();
        $sesion->num_sesion = $numSesion->num_sesion;
        $sesion->id_grupo_lab = $idGrupoLab;
        $sesion->fecha = $fecha;
        $sesion->save();

        return redirect('docente/grupos-de-laboratorio/grupo/sesiones/crear')->with('sesion_reg_successful', 'Se creo la sesion exitosamente');
    }
}
