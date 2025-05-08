<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Carta; // Asegúrate de importar el modelo Carta
use Illuminate\Http\Request; // Aquí importas la clase Request

class CartaController extends Controller
{
    public function index()
    {
        if (!Session::has('usuario')) {
            return redirect('/auth');
        }

        // Obtener todas las cartas
        $cartas = DB::table('carta')->get();

        return view('gestion-cartas.index', compact('cartas'));
    }

    // Editar una carta
    public function editar($id)
    {
        $carta = Carta::findOrFail($id); // Buscar carta por ID
        return view('gestion-cartas.editar', compact('carta')); // Pasamos la carta a la vista de edición
    }

    public function guardarCambios(Request $request)
    {
        // Encontrar la carta por ID
        $carta = Carta::findOrFail($request->id_carta);

        // Actualizar los datos de la carta
        $carta->update([
            'Nombre' => $request->nombre,
            'Tipo' => $request->tipo,
            'PS' => $request->ps,
            'Ataque' => $request->ataque,
            'Descripcion' => $request->descripcion,
            'Precio' => $request->precio,
            'ID_Usuario' => $request->usuario,
            'en_venta' => $request->enventa,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('gestion-cartas.index')->with('success', 'Carta actualizada con éxito');
    }

    // Eliminar una carta
    public function eliminar(Request $request)
    {
        $carta = Carta::findOrFail($request->id_carta); // Buscar la carta a eliminar por su ID
        $carta->delete(); // Eliminar la carta de la base de datos

        return redirect()->route('gestion-cartas.index')->with('success', 'Carta eliminada con éxito');
    }
}
