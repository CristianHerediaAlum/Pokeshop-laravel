@extends('layouts.app')

@section('title', 'Mi Coleccion')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/coleccion.css') }}">
@endpush

@section('content')
    <h1>¡Tu colección Pokémon!</h1>

    <div class="contenedor_mis_cartas">
        @foreach ($mis_cartas as $carta)
            <article class="carta_pokemon">
                <h2>{{ $carta->Nombre }}</h2>
                <img src="{{ asset($carta->Imagen) }}" alt="Imagen de la carta" width="200">
                <a href="{{ route('coleccion.editar', $carta->ID_Carta) }}" class="boton_editar">Editar</a>
                <div class="descripcion_carta">{{ $carta->Descripcion }}</div>
            </article>
        @endforeach
    </div>

    <a href="{{ route('coleccion.crear') }}" class="boton_anadir">Añadir carta</a>
@endsection
