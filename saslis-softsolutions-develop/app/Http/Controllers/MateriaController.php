<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\DocenteMateria;
use App\Docente;

class MateriaController extends Controller
{
    public function verificarCodmateria(Request $request)
    {
        $codmateria = $request->codmateria;
        $materia = Materia::find($codmateria);
        $existe = true;
        if ($materia == null) {
            $existe = false;
        }
        return response()->json(['existe' => $existe]);
    }
    public function verificarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $materia = Materia::where('nombre', $nombre)->first();
        $existe = true;
        if ($materia == null) {
            $existe = false;
        }
        return response()->json(['existe' => $existe]);
    }
}
