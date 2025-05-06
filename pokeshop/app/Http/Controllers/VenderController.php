<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Usuario;

use Illuminate\Support\Facades\DB;


class VenderController extends Controller
{
    public function index()
    {
        $idUsuario = session('ID_Usuario'); // Obtén el ID del usuario desde la sesión

        // Obtén las cartas en venta
        $cartasEnVenta = Carta::where('ID_Usuario', $idUsuario)
            ->where('en_venta', 1)
            ->get();

        // Obtén las cartas sin vender
        $cartasSinVender = Carta::where('ID_Usuario', $idUsuario)
            ->where('en_venta', 0)
            ->get();

        return view('vender.index', compact('cartasEnVenta', 'cartasSinVender'));
    }

    public function toggleVenta(Request $request)
    {
        $cartasSeleccionadas = $request->input('cartas_seleccionadas', []);

        if (!empty($cartasSeleccionadas)) {
            Carta::whereIn('ID_Carta', $cartasSeleccionadas)
                ->update([
                    'en_venta' => DB::raw('CASE WHEN en_venta = 1 THEN 0 ELSE 1 END')
                ]);
        }

        return redirect()->route('vender.index');
    }

}
