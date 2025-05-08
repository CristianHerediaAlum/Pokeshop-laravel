@extends('layouts_admin.app')

@section('title', 'Gestion Cartas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/gestion_cartas.css') }}">
@endsection

@section('content')

<h1>Gestiona las cartas de la web</h1>

<div class="contenedor_usuarios">
@forelse ($cartas as $carta)
    <div class="carta_usuario">
        <div class="carta_imagen">
            <p class="carta_id"><strong>ID:</strong> {{ $carta->ID_Carta }}</p>
            <img src="{{ asset($carta->Imagen) }}" alt="{{ $carta->Nombre }}">
        </div>

        <div class="carta_info">
            <p><strong>Pertenece al usuario:</strong> {{ $carta->ID_Usuario }}</p>
            <p><strong>¿En venta?:</strong> {{ $carta->en_venta }}</p>
            <p><strong>Nombre:</strong> {{ $carta->Nombre }}</p>
            <p><strong>Tipo:</strong> {{ $carta->Tipo }}</p>
            <p><strong>PS:</strong> {{ $carta->PS }}</p>
            <p><strong>Ataque:</strong> {{ $carta->Ataque }}</p>
            <p><strong>Precio:</strong> {{ $carta->Precio }}</p>
            <p><strong>Descripción:</strong> {{ $carta->Descripcion }}</p>
        </div>

        <div class="contenedor_botones">
            <!-- Botón para editar -->
            <a href="{{ route('gestion-cartas.editar', $carta->ID_Carta) }}" class="editar">
                <i class="fa-solid fa-pen"></i>
            </a>

            <!-- Formulario para eliminar -->
            <form method="POST" action="{{ route('gestion-cartas.eliminar') }}" style="display:inline;">
                @csrf
                <input type="hidden" name="id_carta" value="{{ $carta->ID_Carta }}">
                <button type="submit" class="eliminar_usuario" name="eliminar" value="eliminar">✖</button>
            </form>
        </div>
    </div>
@empty
    <p>No hay cartas en la web.</p>
@endforelse
</div>

@endsection
