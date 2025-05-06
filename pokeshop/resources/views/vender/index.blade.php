@extends('layouts.app')

@section('title', 'Vender Cartas')

@push('scripts')
    <script src="{{ asset('js/comprar.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/comprar.css') }}">
    <style>
        h2 {
            color: rgb(255, 255, 255);
            margin-top: 50px;
            text-shadow: 3px 3px 5px #e60012; /* Sombra roja */
        }
        .carta_pokemon h2 {
            font-size: 18px;
            font-weight: bold;
            /* color: #d92c2c; Rojo para resaltar el título */
            color:black;
            margin-top:0px;
            text-shadow: none;
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <h1>¡Publica tus cartas!</h1>

    <h2>Cartas en venta</h2>
    <form method="POST" action="{{ route('vender.toggle') }}">
        @csrf
        <div class="contenedor_ventas_cartas">
            @foreach ($cartasEnVenta as $carta)
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
        </div>

        <h2>Cartas sin vender</h2>
        <div class="contenedor_ventas_cartas">
            @foreach ($cartasSinVender as $carta)
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
        </div>

        <button type="submit" class="boton_comprar">Vender/No vender</button>
    </form>
@endsection
