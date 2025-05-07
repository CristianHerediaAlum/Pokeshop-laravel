<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilAdminController extends Controller
{
    // Mostrar el perfil
    public function index()
    {
        return view('perfil-admin.index'); // Asegúrate de tener esta vista
    }

    // Editar datos (nombre, apellidos, etc.)
    public function editar(Request $request)
    {
        $atributo = $request->input('atributo');
        // Lógica para editar el atributo en la base de datos
        return view('perfil-admin.editar-perfil', compact('atributo'));
    }

    public function editarDato(Request $request)
    {
        $campo = $request->input('atributo');
        $nuevoValor = $request->input($campo);

        DB::table('usuario')
            ->where('ID_Usuario', session('ID_Usuario'))
            ->update([$campo => $nuevoValor]);

        // Actualizar la sesión para reflejar el cambio
        if($campo != 'Nickname'){
            session([$campo => $nuevoValor]);
        }
        else{
            session(['usuario' => $nuevoValor]);
        }
        

        return redirect()->route('perfil-admin.index')->with('success', 'Perfil actualizado correctamente');
    }


    // Vista para cambiar contraseña
    public function cambiarContrasena()
    {
        return view('perfil-admin.cambiar-contrasena'); // Vista para cambiar contraseña
    }

    public function confirmarContrasena(Request $request)
    {
        $nuevaContrasena = $request->input('contrasena');

        // Validaciones
        if (strlen($nuevaContrasena) < 6) {
            return back()->with('error', 'La contraseña debe tener al menos 6 caracteres.');
        }

        if (!preg_match('/[a-z]/', $nuevaContrasena)) {
            return back()->with('error', 'La contraseña debe contener al menos una letra minúscula.');
        }

        if (!preg_match('/[A-Z]/', $nuevaContrasena)) {
            return back()->with('error', 'La contraseña debe contener al menos una letra mayúscula.');
        }

        if (!preg_match('/\d/', $nuevaContrasena)) {
            return back()->with('error', 'La contraseña debe contener al menos un número.');
        }

        // Obtener el ID del usuario desde la sesión
        $id = session('ID_Usuario');
        $usuario = DB::table('usuario')->where('ID_Usuario', $id)->first();

        if (!$usuario) {
            return back()->with('error', 'Usuario no encontrado.');
        }

        // Hashear y actualizar la contraseña
        $hash = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        DB::table('usuario')
            ->where('ID_Usuario', $id)
            ->update(['Contrasena' => $hash]);

        return redirect()->route('perfil-admin.index')->with('success', 'Contraseña actualizada correctamente.');
    }


}