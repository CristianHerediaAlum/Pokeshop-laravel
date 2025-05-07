<!-- resources/views/pokeshop/index.blade.php -->
@extends('layouts_admin.app')

@section('title', 'Pokeshop')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush


@section('content')
<h1>¡Bienvenido a PokeShop!</h1>

<div class="carrusel-wrapper">
    <div class="carrusel">
        @php
            $imagenes = ['charizard.webp', 'pikachu.jpg', 'snorlax.jpg', 'gengar.png', 'eeve.jpg', 'bulbasur.jpg', 'blaziken.png'];
        @endphp

        @foreach (array_merge($imagenes, $imagenes) as $imagen)
            <div class="carta"><img src="{{ asset('imgs/' . $imagen) }}" alt="{{ pathinfo($imagen, PATHINFO_FILENAME) }}"></div>
        @endforeach
    </div>
</div>

<h2>¡Pikachu, Bulbasur, Charizard y muchos más están de vuelta!</h2>

<div class="info-seccion">
    <h2>¿Qué puedes hacer en PokeShop?</h2>
    <p>⭐ Comprar cartas exclusivas de Pokémon y ampliar tu colección.</p>
    <p>⭐ Vender tus cartas a otros entrenadores y ganar monedas virtuales.</p>
    <p>⭐ Administrar y exhibir tu colección en tu perfil personal.</p>
    <p>⭐ Conectar con otros fans del universo Pokémon.</p>
</div>

<h2>Por si no los recuerdas...</h2>
<ul class="youtube_juego">
    <li>
        <a href="https://www.youtube.com/@OfficialPoke%CC%81monTV" target="_blank">
            <img src="{{ asset('imgs/capitulo.jpg') }}" alt="YouTube">
            <div class="content"><span><p>POKEMON TV</p></span></div>
        </a>
    </li>
    <li>
        <a href="https://play.pokemonshowdown.com/" target="_blank">
            <img src="{{ asset('imgs/combate.webp') }}" alt="Juego Pokémon">
            <div class="content"><span><p>POKEMON SHOWDOWN</p></span></div>
        </a>
    </li>
    <li>
        <a href="https://play.google.com/store/apps/details?id=com.nianticlabs.pokemongo&hl=es" target="_blank">
            <img src="{{ asset('imgs/pokemon_go.jpg') }}" alt="Pokemon GO">
            <div class="content"><span><p>POKEMON GO</p></span></div>
        </a>
    </li>
</ul>
@endsection
<!-- resources/views/pokeshop/index-admin.blade.php -->