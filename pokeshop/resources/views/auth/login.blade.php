<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<!-- Mensaje de éxito al registrarse -->
@if(session('success'))
    <p class="success" style="color: green;">{{ session('success') }}</p>
@endif

<!-- Mensaje de error al intentar iniciar sesión -->
@if(session('error'))
    <p class="error" style="color: red;">{{ session('error') }}</p>
@endif

<!-- Mensajes de error de validación -->
@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">

    <!-- Formulario de Login -->
    <div class="form-box">
        <h2>Iniciar Sesión</h2>
        <form action="/login" method="POST">
            @csrf
            <label for="nickname">Nickname:</label>
            <input type="text" name="nickname" id="nickname" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

    <!-- Formulario de Registro -->
    <div class="form-box">
        <h2>Registrarse</h2>
        <form action="/register" method="POST">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" required>

            <label for="nickname">Nickname:</label>
            <input type="text" name="nickname" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <label for="contrasena_confirmation">Repetir Contraseña:</label>
            <input type="password" name="contrasena_confirmation" required>
            
            <button type="submit">Registrarse</button>
        </form>
    </div>

</div>

</body>
</html>
