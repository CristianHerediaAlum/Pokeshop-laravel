@extends('layouts_admin.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editar-usuario.css') }}">

<div class="form-container">
<form action="{{ route('guardar-cambios') }}" method="POST">
    @csrf
    <div class="input-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ $usuario->Nombre }}" required>
    </div>
    <div class="input-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="{{ $usuario->Apellidos }}" required>
    </div>
    <div class="input-group">
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="{{ $usuario->Correo }}" required>
    </div>
    <div class="input-group">
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" value="{{ $usuario->Nickname }}" required>
    </div>
    <div class="input-group">
        <label for="saldo">Saldo</label>
        <input type="number" name="saldo" value="{{ $usuario->Saldo }}" required>
    </div>
    <div class="form-actions">
        <button type="submit" class="guardar-btn">Guardar Cambios</button>
    </div>
</form>
</div>
@endsection
