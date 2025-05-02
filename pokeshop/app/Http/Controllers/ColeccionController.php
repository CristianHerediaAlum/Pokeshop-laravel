<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;

class ColeccionController extends Controller
{
    public function index(Request $request)
    {
        // Simula el ID del usuario (esto debería venir de la autenticación)
        $idUsuario = $request->user()->id ?? 1;

        // Obtén las cartas en venta que no pertenecen al usuario
        $mis_cartas = Carta::where('ID_Usuario', '=', $idUsuario)
            ->get();

        return view('coleccion.index', compact('mis_cartas'));
    }
    public function añadir(Request $request)
    {

    }
}