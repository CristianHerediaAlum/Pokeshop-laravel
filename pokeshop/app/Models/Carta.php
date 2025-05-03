<?php
// filepath: c:\xampp\htdocs\laravel\Pokeshop-laravel\pokeshop\app\Models\Carta.php

namespace App\Models;

// Para generar datos ficticios
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;
    
    protected $table = 'carta'; // Opcional

    public $timestamps = false;

    
    // Atributos a rellenar (todos menos id)
    protected $fillable = ['Nombre', 'Tipo', 'PS', 'Ataque', 'Precio', 'Imagen', 'ID_Usuario', 'en_venta', 'Descripcion'];
}
