<!-- filepath: c:\xampp\htdocs\laravel\Pokeshop-laravel\pokeshop\resources\views\coleccion\index.blade.php -->
@extends('layouts.app')

@section('title', 'Mi Coleccion')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/coleccion.css') }}">
@endpush


@section('content')
    <h1>¡Tu colección Pokémon!</h1>
    <form method="GET" action="{{ route('coleccion.añadir') }}">
        @csrf
        <div class="contenedor_mis_cartas">
            @foreach ($mis_cartas as $carta)
                <article class="carta_pokemon">
                    <h2>{{ $carta->Nombre }}</h2>
                    <img src="{{ $carta->Imagen }}" alt="Imagen de la carta" width="200">
                    <div class="descripcion_carta">{{ $carta->Descripcion }}</div>
                </article>
            @endforeach
        </div>
        <button type="submit" class="boton_anadir">Añadir carta</button>
    </form>
@endsection