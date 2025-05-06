<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carta;
use Illuminate\Support\Facades\Auth;

class BuscadorCartas extends Component
{
    public $busqueda = '';
    public $precioMin = 0, $precioMax = 1000;
    public $ataqueMin = 0, $ataqueMax = 500;
    public $psMin = 0, $psMax = 500;
    public $tipo = '';
    public $tipos = []; // Se cargan dinámicamente

    public function mount()
    {
        $this->tipos = Carta::distinct()->pluck('Tipo')->toArray();
    }

    public function render()
    {
        $usuarioId = session('ID_Usuario');
        $carrito = session('Carrito', []);



        // $cartas = Carta::where('ID_Usuario', '!=', $usuarioId)
        //     ->where('en_venta', 1)
        //     ->whereNotIn('ID_Carta', $carrito)
        //     ->where('Nombre', 'like', '%' . $this->busqueda . '%')
        //     ->get();
        $cartas = Carta::where('ID_Usuario', '!=', $usuarioId)
            ->where('en_venta', 1)
            ->whereNotIn('ID_Carta', $carrito)
            ->when($this->busqueda, function($query) {
                $query->where('Nombre', 'like', '%' . $this->busqueda . '%');
            })
            ->whereBetween('Precio', [$this->precioMin, $this->precioMax])
            ->whereBetween('Ataque', [$this->ataqueMin, $this->ataqueMax])
            ->whereBetween('PS', [$this->psMin, $this->psMax]);
        
        if ($this->tipo !== '') {
            $cartas = $cartas->where('Tipo', $this->tipo);
        }

        // $tiposDisponibles = Carta::select('Tipo')->distinct()->pluck('Tipo');
        return view('livewire.buscador-cartas', [
            'cartas' => $cartas->get()
        ]);
    }
}
