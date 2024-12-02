<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruta; // Importa el modelo Fruta

class FrutaController extends Controller
{
    public function getFrutas()
    {
        // Obtener todas las frutas desde la base de datos
        $frutas = Fruta::all();
        return response()->json($frutas);
    }
}
