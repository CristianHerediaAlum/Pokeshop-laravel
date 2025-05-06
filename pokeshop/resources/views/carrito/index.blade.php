<!-- filepath: c:\xampp\htdocs\laravel\Pokeshop-laravel\pokeshop\resources\views\carrito\index.blade.php -->
@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('compra_realizada'))
        <h1>¡Gracias por la compra!</h1>
        <div class="contenedor_ventas_cartas">
            <img src="{{ asset('imgs/pikachu_feliz.gif') }}" alt="Pikachu feliz" width="300">
        </div>
        @php
            session()->forget('compra_realizada'); // Limpia la variable de sesión
        @endphp
    @elseif ($cartas->isEmpty())
        <h1>¡Carrito vacío!</h1>
        <img src="{{ asset('imgs/giphy.gif') }}" alt="Pikachu triste" width="300">
    @else
        <h1>¡Este es tu carrito!</h1>
        <div class="contenedor_ventas_cartas">
            @foreach ($cartas as $carta)
                <article class="carta_pokemon">
                    <form method="POST" action="{{ route('carrito.eliminar') }}">
                        @csrf
                        <input type="hidden" name="id_carta" value="{{ $carta->ID_Carta }}">
                        <button type="submit" class="eliminar_carta">✖</button>
                    </form>
                    <h2>{{ $carta->Nombre }}</h2>
                    <img src="{{ asset($carta->Imagen) }}" alt="Imagen de la carta" width="200">
                    <p>Tipo: {{ $carta->Tipo }}</p>
                    <p>PS: {{ $carta->PS }}</p>
                    <p>Ataque: {{ $carta->Ataque }}</p>
                    <p>Precio: {{ $carta->Precio }} puntos</p>
                </article>
            @endforeach
        </div>
        <form method="POST" action="{{ route('carrito.comprar') }}">
            @csrf
            <button type="submit" class="boton_comprar">Comprar ({{ $total }})</button>
        </form>
    @endif
@endsection