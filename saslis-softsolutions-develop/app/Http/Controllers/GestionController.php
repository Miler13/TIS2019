<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gest;

class GestionController extends Controller
{
    public function verificarNombre(Request $request)
    {
        $gestionNombre = $request->nombre;
        $gestion = Gest::all();
        $existe = false;
        foreach ($gestion as $actual) {
            if ($actual->nombre_gestion == $gestionNombre) {
                $existe = true;
            }
        }
        return response()->json(['existe' => $existe]);
    }
}
