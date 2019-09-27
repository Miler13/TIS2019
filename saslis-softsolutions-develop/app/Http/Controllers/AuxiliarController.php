<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoLaboratorio;
use Illuminate\Support\Facades\Auth;
use App\AuxiliarLaboratorio;
use App\Auxiliar;

class AuxiliarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:auxiliar');
    }

    public function index()
    {
        return view('auxiliar.auxiliar-home');
    }

    public function listaDeGruposDeLaboratorio()
    {
        $codSisAux = Auth::user()->codsis_aux;
        $gruposLaboratorios = GrupoLaboratorio::all();
        $data = [
            'grupo_laboratorio' => $gruposLaboratorios,
        ];
        return view('grupo_laboratorio.grupo_laboratorio-lista')->with('data', $data);
    }

    public function tomarGrupo(Request $request)
    {
        $idAuxiliar = $request->id_auxiliar;
        $idGrupoLab = $request->id_grupo_lab;
        $auxiliarLaboratorio = new AuxiliarLaboratorio();
        $auxiliarLaboratorio->id_auxiliar = $idAuxiliar;
        $auxiliarLaboratorio->id_grupo_lab = $idGrupoLab;
        $auxiliarLaboratorio->save();
        if ($auxiliarLaboratorio) {
            return redirect()->route('auxiliar.grupos.tomados')->with('aux_grup_lab_successful', 'Te inscribiste como Auxiliar para este grupo de laboratorio');
        } else {
            return redirect()->route('auxiliar.grupos.tomados')->with('aux_grup_lab_warning', 'Hubo un error, no pudiste asignarte este grupo de laboratorio');
        }
    }

    public function mostrarGruposTomados()
    {
        $idAuxiliar = Auth::user()->id_auxiliar;
        $auxiliarGrupoLab = AuxiliarLaboratorio::where('id_auxiliar', $idAuxiliar)->get();
        $gruposLaboratoriosDelAuxiliar = [];
        foreach ($auxiliarGrupoLab as $auxiliarGrupoLab) {
            $grupoLaboratorio = GrupoLaboratorio::find($auxiliarGrupoLab->id_grupo_lab);
            if ($grupoLaboratorio != null) {
                $grupoLaboratorio['auxiliar'] = Auxiliar::find($idAuxiliar)->nombre;
                $grupoLaboratorio['auxiliar_ap'] = Auxiliar::find($idAuxiliar)->apellidos;
                array_push($gruposLaboratoriosDelAuxiliar, $grupoLaboratorio);
            }
        }
        $data = [
            'grupos_laboratorio' => $gruposLaboratoriosDelAuxiliar,
        ];
        return view('auxiliar.auxiliar-grupo-lab-lista')->with('data', $data);
    }
}
