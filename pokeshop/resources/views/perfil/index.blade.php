@extends('layouts.app')

@section('title', 'Perfil')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
@endpush

@section('content')
    <h1>Este es tu perfil</h1>

    <form action="{{ route('perfil.editar-dato') }}" method="POST">
    @csrf
    <div class="perfil">
        @if(session('error3'))
            <p style="color:red">{{ session('error3') }}</p>
        @endif

        <p class="perfil-completo">
            Nombre: {{ session('Nombre') }}
            <a href="{{ route('perfil.editar-perfil', ['atributo' => 'Nombre']) }}" class="editar"><i class="fa-solid fa-pen"></i></a>
        </p>

        <p class="perfil-completo">
            Apellidos: {{ session('Apellidos') }}
            <a href="{{ route('perfil.editar-perfil', ['atributo' => 'Apellidos']) }}" class="editar"><i class="fa-solid fa-pen"></i></a>
        </p>

        <p class="perfil-completo">
            Correo electrónico: {{ session('Correo') }}
            <a href="{{ route('perfil.editar-perfil', ['atributo' => 'Correo']) }}" class="editar"><i class="fa-solid fa-pen"></i></a>
        </p>

        <p class="perfil-completo">
            Nickname: {{ session('usuario') }}
            <a href="{{ route('perfil.editar-perfil', ['atributo' => 'Nickname']) }}" class="editar"><i class="fa-solid fa-pen"></i></a>
        </p>

        <p class="perfil-completo">Contraseña: ****</p>
        <p class="perfil-completo">Saldo en la cuenta: {{ session('Saldo') }} puntos</p>

        <div class="contenedor-botones">
            <a href="{{ route('perfil.ingresar-saldo') }}" class="botones-principales">Ingresar saldo</a>
            <a href="{{ route('perfil.cambiar-contrasena') }}" class="botones-principales">¿Quieres cambiar tu contraseña?</a>
        </div>
    </div>
</form>

@endsection
