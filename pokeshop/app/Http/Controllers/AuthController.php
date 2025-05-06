<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $nickname = $request->input('nickname');
        $contrasena = $request->input('contrasena');

        $usuario = Usuario::where('Nickname', $nickname)->first();

        if ($usuario && password_verify($contrasena, $usuario->Contrasena)) {
            session([
                'ID_Usuario' => $usuario->ID_Usuario,
                'Nombre' => $usuario->Nombre,
                'Apellidos' => $usuario->Apellidos,
                'Correo' => $usuario->Correo,
                'usuario' => $nickname,
                'Contrasena' => $usuario->Contrasena,
                'Saldo' => $usuario->Saldo,
                'Es_admin' => $usuario->Es_admin,
            ]);

            return redirect('/');
        } else {
            return back()->with('error', 'Usuario o contraseña incorrectos.');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:30',
            'apellidos' => 'required|string|min:2|max:60',
            'correo' => [
                'required',
                'email:rfc,dns', //debe tener formato de correo válido, y se hace validación RFC y de dominio DNS.
                'unique:usuario,Correo' //único en la base de datos
            ],
            'nickname' => 'required|alpha_num|min:3|max:20|unique:usuario,Nickname',
            'contrasena' => [
                'required',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/' //Minuscula, mayuscula y numero
            ],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe tener un formato válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'nickname.required' => 'El nickname es obligatorio.',
            'nickname.alpha_num' => 'El nickname solo puede contener letras y números.',
            'nickname.unique' => 'Este nickname ya está en uso.',
            'contrasena.required' => 'La contraseña es obligatoria.',
            'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'contrasena.confirmed' => 'Las contraseñas no coinciden.',
            'contrasena.regex' => 'La contraseña debe incluir al menos una mayúscula, una minúscula y un número.',
        ]);

        Usuario::create([
            'Nombre' => $request->nombre,
            'Apellidos' => $request->apellidos,
            'Correo' => $request->correo,
            'Nickname' => $request->nickname,
            'Contrasena' => Hash::make($request->contrasena),
        ]);

        return back()->with('success', 'Registro exitoso. Ya puedes iniciar sesión.');
    }
}