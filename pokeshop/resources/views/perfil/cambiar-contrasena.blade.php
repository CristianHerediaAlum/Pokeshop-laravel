@extends('layouts.app')

@section('title', 'Cambiar contraseña')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil2.css') }}">
@endpush


@section('content')
    <h1>Cambiar tu contraseña</h1>

    <form action="{{ route('perfil.confirmar-contrasena') }}" method="POST">
        @csrf
        <div class="perfil">
            @if(session('error'))
                <p style="color:red">{{ session('error') }}</p>
            @endif

            <p class="perfil-dentro">Introduce tu nueva contraseña:</p>
            <input class="perfil-dentro" type="password" name="contrasena" required>
            <button type="submit">Confirmar</button>
        </div>
    </form>
@endsection
