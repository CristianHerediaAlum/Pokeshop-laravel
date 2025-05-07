@extends('layouts_admin.app')

@section('title', 'Editar perfil Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil2.css') }}">
@endpush

@section('content')
    <h1>Estás editando tu perfil</h1>

    <form action="{{ route('perfil-admin.editar-dato') }}" method="POST">
        @csrf
        <input type="hidden" name="atributo" value="{{ $atributo }}">
        <div class="perfil">
            @if(session('error3'))
                <p style="color:red">{{ session('error3') }}</p>
            @endif

            <p class="perfil-dentro">Introduce tu nuevo {{ $atributo }}:</p>
            <input class="perfil-dentro" type="text" name="{{ $atributo }}" required>
            <button type="submit">Confirmar cambio</button>
        </div>
    </form>

@endsection
