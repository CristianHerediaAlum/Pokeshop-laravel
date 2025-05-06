<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'ID_Usuario';
    public $timestamps = false;

    protected $fillable = [
        'Nombre', 'Apellidos', 'Correo', 'Nickname', 'Contrasena', 'Saldo', 'Es_admin'
    ];

    protected $hidden = ['Contrasena'];

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}

