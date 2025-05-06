@extends('layouts.app')

@section('title', 'Editar Carta')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/anadir_carta.css') }}">
@endpush

@section('content')
<div class="form-container">
    <div class="form-box">
        <h2>Editar carta Pokémon</h2>

        <form method="POST" action="{{ route('coleccion.actualizar', $carta->ID_Carta) }}" enctype="multipart/form-data">
            @csrf

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $carta->Nombre }}" required>

            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" value="{{ $carta->Tipo }}" required>

            <label for="PS">PS:</label>
            <input type="number" name="PS" id="PS" value="{{ $carta->PS }}" required>

            <label for="ataque">Ataque:</label>
            <input type="number" name="ataque" id="ataque" value="{{ $carta->Ataque }}" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ $carta->Precio }}" required>

            <label for="desc">Descripción:</label>
            <input type="text" name="desc" id="desc" value="{{ $carta->Descripcion }}">

            <label for="imagen">Cambiar imagen (opcional):</label>
            <input type="file" name="imagen" id="imagen" accept="image/*">

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>
@endsection
