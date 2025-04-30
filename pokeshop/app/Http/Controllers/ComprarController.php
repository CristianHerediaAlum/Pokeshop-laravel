<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;

class ComprarController extends Controller
{
    public function index(Request $request)
    {
        // Simula el ID del usuario (esto debería venir de la autenticación)
        $idUsuario = $request->user()->id ?? 1;

        // Obtén las cartas en venta que no pertenecen al usuario
        $cartas = Carta::where('ID_Usuario', '!=', $idUsuario)
            ->where('en_venta', 1)
            ->get();

        // Filtra las cartas que no están en el carrito
        $carrito = session('Carrito', []);
        $cartas = $cartas->filter(function ($carta) use ($carrito) {
            return !in_array($carta->ID_Carta, $carrito);
        });

        return view('comprar.index', compact('cartas'));
    }

    public function agregarAlCarrito(Request $request)
    {
        $cartasSeleccionadas = $request->input('cartas_seleccionadas', []);
        $carrito = session('Carrito', []);

        // Agrega las cartas seleccionadas al carrito
        session(['Carrito' => array_merge($carrito, $cartasSeleccionadas)]);

        return redirect()->route('comprar.index');
    }
}