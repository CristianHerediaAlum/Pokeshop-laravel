<!-- filepath: c:\xampp\htdocs\laravel\Pokeshop-laravel\pokeshop\resources\views\comprar\index.blade.php -->
@extends('layouts.app')

@section('title', 'Comprar Cartas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/comprar.js') }}"></script>
@endpush

@section('content')
    <h1>¡Aquí puedes comprar cartas!</h1>
    <form method="POST" action="{{ route('comprar.agregar') }}">
        @csrf
        @livewire('buscador-cartas')
        {{-- <div class="contenedor_ventas_cartas">
            @foreach ($cartas as $carta)
                <article class="carta_pokemon" onclick="seleccionarCarta(this, {{ $carta->ID_Carta }});">
                    <h2>{{ $carta->Nombre }}</h2>
                    <img src="{{ asset($carta->Imagen) }}" alt="Imagen de la carta" width="200">
                    <p>Tipo: {{ $carta->Tipo }}</p>
                    <p>PS: {{ $carta->PS }}</p>
                    <p>Ataque: {{ $carta->Ataque }}</p>
                    <p>Precio: {{ $carta->Precio }} puntos</p>
                    <input type="checkbox" name="cartas_seleccionadas[]" value="{{ $carta->ID_Carta }}" hidden>
                </article>
            @endforeach
        </div> --}}
        <button type="submit" class="boton_comprar">Meter en carrito</button>
    </form>
@endsection