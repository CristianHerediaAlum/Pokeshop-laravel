<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi sitio')</title>
    <link rel="icon" type="image/png" href="{{ asset('imgs/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js') --}}
    @stack('styles')
    @stack('scripts')


    @livewireStyles
</head>
<body>
    @include('layouts.nav')
    {{-- <header>
        <h1>Pokeshop</h1>
    </header> --}}

    <main>
        @yield('content')
    </main>

    @include('layouts.footer') <!-- Aquí se incluye el footer -->
    @livewireScripts
</body>
</html>
