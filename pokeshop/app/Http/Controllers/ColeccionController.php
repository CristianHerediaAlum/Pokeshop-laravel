<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;

class ColeccionController extends Controller
{
    public function index(Request $request)
    {
        // Simula el ID del usuario (esto debería venir de la autenticación)
        $idUsuario = session('ID_Usuario'); // Obtén el ID del usuario desde la sesión

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
    
        $idUsuario = session('ID_Usuario'); // Obtén el ID del usuario desde la sesión
    
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

    public function editar($id)
    {
        $carta = Carta::findOrFail($id);
        return view('coleccion.editar', compact('carta'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'PS' => 'required|integer|min:0',
            'ataque' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'desc' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $carta = Carta::findOrFail($id);

        $carta->Nombre = $request->nombre;
        $carta->Tipo = $request->tipo;
        $carta->PS = $request->PS;
        $carta->Ataque = $request->ataque;
        $carta->Precio = $request->precio;
        $carta->Descripcion = $request->desc;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imgs'), $nombreImagen);
            $carta->Imagen = 'imgs/' . $nombreImagen;
        }

        $carta->save();

        return redirect()->route('coleccion.index')->with('mensaje', 'Carta actualizada con éxito.');
    }
    
}

