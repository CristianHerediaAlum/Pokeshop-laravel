<!-- resources/views/layouts/nav.blade.php -->
<nav>
    <img src="{{ asset('imgs/logo.png') }}" alt="Logo Pokémon">
    <p>PokeShop</p>
    <a href="{{ url('/') }}">🏠 Inicio</a>
    <a href="{{ route('gestion-cartas.index') }}">📝 Gestión de cartas</a> <!-- Aprobar/rechazar cartas en venta, editar o eliminar listados. -->
    <a href="{{ route('gestion-usuarios.index') }}"> 🛠️ Gestión de Usuarios</a> <!-- Agregar, editar, suspender o eliminar usuarios. -->
    <a href="{{ route('perfil-admin.index') }}">👤 Perfil</a>
    <a href="{{ route('logout') }}" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</nav>