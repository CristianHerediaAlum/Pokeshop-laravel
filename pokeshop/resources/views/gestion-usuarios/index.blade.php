@extends('layouts_admin.app')

@section('title', 'Gestión de Usuarios')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/gestion_usuarios.css') }}">
@endsection

@section('content')

<h1>Gestiona los usuarios de la web</h1>

<div class="contenedor_usuarios">
    @forelse ($usuarios as $usuario)
        <div class='carta_usuario'>
            <p>
                <strong>ID:</strong> {{ $usuario->ID_Usuario }} |
                <strong>Nombre:</strong> {{ $usuario->Nombre }} |
                <strong>Apellidos:</strong> {{ $usuario->Apellidos }} |
                <strong>Correo:</strong> {{ $usuario->Correo }} |
                <strong>Nickname:</strong> {{ $usuario->Nickname }} |
                <strong>Saldo:</strong> {{ $usuario->Saldo }}
            </p>

            <div class="contenedor_botones">
                <form method="POST" action="{{ route('gestion-usuarios.editar') }}">
                    @csrf
                    <input type="hidden" name="id_usuario" value="{{ $usuario->ID_Usuario }}">
                    <button type="submit" class="editar"><i class="fa-solid fa-pen"></i></button>
                </form>

                <form method="POST" action="{{ route('usuarios.eliminar') }}">
                    @csrf
                    <input type="hidden" name="id_usuario" value="{{ $usuario->ID_Usuario }}">
                    <button type="submit" class="eliminar_usuario">✖</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay usuarios registrados.</p>
    @endforelse
</div>

@endsection
