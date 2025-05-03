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
    public function crear()
    {
        return view('coleccion.anadir');
    }

    public function anadir(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'PS' => 'required|integer|min:0',
            'ataque' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string',
            'imagen' => 'required|image|max:2048',
        ]);
    
        $idUsuario = $request->user()->id ?? 1;
    
        // Guardar imagen en public/imgs
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('imgs'), $nombreImagen);
        $imagenRuta = 'imgs/' . $nombreImagen;
    
        // Guardar carta en la base de datos
        Carta::create([
            'ID_Usuario' => $idUsuario,
            'Nombre' => $request->nombre,
            'Tipo' => $request->tipo,
            'PS' => $request->PS,
            'Ataque' => $request->ataque,
            'Precio' => $request->precio,
            'Descripcion' => $request->desc,
            'Imagen' => $imagenRuta,
        ]);
    
        return redirect()->route('coleccion.index')->with('mensaje', 'Carta añadida con éxito.');
    }
    
}