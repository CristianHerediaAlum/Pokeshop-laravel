@extends('layouts.app')

@section('title', 'Añadir Carta')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/anadir_carta.css') }}">
@endpush

@section('content')
    <div class="form-container">
        <div class="form-box">
            <h2>¡Añade tu nuevo pokémon!</h2>

            @if(session('mensaje'))
                <div class="exito">{{ session('mensaje') }}</div>
            @elseif($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('coleccion.anadir') }}" enctype="multipart/form-data">
                @csrf

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" required>

                <label for="PS">PS:</label>
                <input type="number" name="PS" id="PS" required>

                <label for="ataque">Ataque:</label>
                <input type="number" name="ataque" id="ataque" required>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" required>

                <label for="desc">Descripción:</label>
                <input type="text" name="desc" id="desc">

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required>

                <button type="submit" name="anadir">Añadir</button>
            </form>
        </div>
    </div>
@endsection
