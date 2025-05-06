<?php

namespace App\Http\Controllers;

use App\Models\Carta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CarritoController extends Controller
{
    public function index()
    {
        // Verifica si el carrito está vacío
        $carrito = session('Carrito', []);
        $cartas = collect();
        $total = 0;

        if (!empty($carrito)) {
            // Obtén las cartas del carrito
            $cartas = Carta::whereIn('ID_Carta', $carrito)->get();
            $total = $cartas->sum('Precio');
        }

        return view('carrito.index', compact('cartas', 'total'));
    }
    public function comprar(Request $request)
    {
        $carrito = session('Carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        $total = Carta::whereIn('ID_Carta', $carrito)->sum('Precio');
        $saldo = session('Saldo', 0);

        if ($saldo < $total) {
            return redirect()->route('carrito.index')->with('error', 'No hay saldo suficiente.');
        }

        // Actualiza el saldo de los vendedores
        $cartas = Carta::whereIn('ID_Carta', $carrito)->get();
        foreach ($cartas as $carta) {
            Carta::where('ID_Usuario', $carta->ID_Usuario)->increment('Saldo', $carta->Precio);
        }

        // Actualiza las cartas para asignarlas al usuario actual
        $usuarioId = session('ID_Usuario');
        Carta::whereIn('ID_Carta', $carrito)->update([
            'en_venta' => 0,
            'ID_Usuario' => $usuarioId,
        ]);

        // Actualiza el saldo del usuario actual
        Carta::where('ID_Usuario', $usuarioId)->decrement('Saldo', $total);
        session(['Saldo' => $saldo - $total]);

        // Limpia el carrito
        session(['Carrito' => []]);

        session(['compra_realizada' => true]);

        return redirect()->route('carrito.index');
    }

    public function eliminar(Request $request)
    {
        $carrito = session('Carrito', []);
        $idCarta = $request->input('id_carta');

        // Elimina la carta del carrito
        $carrito = array_filter($carrito, function ($id) use ($idCarta) {
            return $id != $idCarta;
        });

        session(['Carrito' => $carrito]);

        return redirect()->route('carrito.index')->with('success', 'Carta eliminada del carrito.');
    }
}
