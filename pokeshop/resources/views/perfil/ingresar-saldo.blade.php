@extends('layouts.app')

@section('title', 'Ingresar saldo')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil2.css') }}">
@endpush



@section('content')
    <h1>Selecciona un lote de puntos</h1>

    <form action="{{ route('perfil.confirmar-saldo') }}" method="POST">
        @csrf
        <div class="perfil">
            <div class="opcion" id="opcion1" onclick="seleccionarOpcion('opcion1')">
                1€ = 10 puntos
            </div>
            <div class="opcion" id="opcion2" onclick="seleccionarOpcion('opcion2')">
                5€ = 50 puntos
            </div>
            <div class="opcion" id="opcion3" onclick="seleccionarOpcion('opcion3')">
                10€ = 100 puntos
            </div>

            <input type="hidden" name="cantidad" id="cantidadSeleccionada" value="">
            <button type="submit">Confirmar</button>
        </div>
    </form>

    <style>
        .opcion {
            background-color: white;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid rgb(219, 57, 71);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .opcion:hover {
            background-color: #f0f0f0;
        }

        .opcion.seleccionado {
            background-color: rgb(219, 57, 71);
            color: white;
        }
    </style>

    <script>
        function seleccionarOpcion(opcion) {
            document.getElementById('opcion1').classList.remove('seleccionado');
            document.getElementById('opcion2').classList.remove('seleccionado');
            document.getElementById('opcion3').classList.remove('seleccionado');

            document.getElementById(opcion).classList.add('seleccionado');

            let cantidad = '';
            if (opcion === 'opcion1') {
                cantidad = '10';
            } else if (opcion === 'opcion2') {
                cantidad = '50';
            } else if (opcion === 'opcion3') {
                cantidad = '100';
            }

            document.getElementById('cantidadSeleccionada').value = cantidad;
        }
    </script>
@endsection
