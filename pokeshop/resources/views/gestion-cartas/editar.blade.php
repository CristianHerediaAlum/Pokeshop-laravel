@extends('layouts_admin.app')

@section('title', 'Editar Carta')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/editar-carta.css') }}">
@endsection

@section('content')

<h1>Editar Carta</h1>

<div class="form-container">
    <form action="{{ route('guardar-cambios-en-cartas') }}" method="POST">
        @csrf
        <input type="hidden" name="id_carta" value="{{ $carta->ID_Carta }}">

        <!-- Nombre -->
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $carta->Nombre }}" required>
        </div>

        <!-- Tipo -->
        <div class="input-group">
            <label for="tipo">Tipo</label>
            <input type="text" id="tipo" name="tipo" value="{{ $carta->Tipo }}" required>
        </div>

        <!-- PS -->
        <div class="input-group">
            <label for="ps">PS</label>
            <input type="text" id="ps" name="ps" value="{{ $carta->PS }}" required>
        </div>

        <!-- Ataque -->
        <div class="input-group">
            <label for="ataque">Ataque</label>
            <input type="text" id="ataque" name="ataque" value="{{ $carta->Ataque }}" required>
        </div>

        <!-- Descripcion -->
        <div class="input-group">
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $carta->Descripcion }}" required>
        </div>

        <!-- Precio -->
        <div class="input-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="{{ $carta->Precio }}" required>
        </div>

        <!-- ID_Usuario -->
        <div class="input-group">
            <label for="usuario">Pertenece a</label>
            <input type="number" id="usuario" name="usuario" value="{{ $carta->ID_Usuario }}" required>
        </div>

        <!-- En_venta -->
        <div class="input-group">
            <label for="enventa">En Venta</label>
            <input type="number" id="enventa" name="enventa" value="{{ $carta->en_venta }}" required>
        </div>

        <!-- Botón de guardar -->
        <div class="form-actions">
            <button type="submit" class="guardar-btn">Guardar Cambios</button>
        </div>
    </form>
</div>

@endsection
