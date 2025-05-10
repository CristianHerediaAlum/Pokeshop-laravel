<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('gestion-usuarios.index', compact('usuarios'));
    }

    public function eliminar(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);
        $usuario->delete();

        return redirect()->route('gestion-usuarios.index')->with('success', 'Usuario eliminado con éxito');
    }

    public function editar(Request $request)
    {
        $idUsuario = $request->input('id_usuario');
        session(['editar-usuarios' => $idUsuario]);

        return redirect()->route('editar.usuario');
    }

    public function guardarCambios(Request $request)
    {
        $id = session('editar-usuarios');
        
        $usuario = Usuario::findOrFail($id);
        $usuario->Nombre = $request->nombre;
        $usuario->Apellidos = $request->apellidos;
        $usuario->Correo = $request->correo;
        $usuario->Nickname = $request->nickname;
        $usuario->Saldo = $request->saldo;
        $usuario->verified = $request->verified;
        $usuario->save();

        return redirect()->route('gestion-usuarios.index')->with('success', 'Cambios guardados correctamente.');
    }

}
