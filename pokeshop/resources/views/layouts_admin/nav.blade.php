<!-- resources/views/layouts/nav.blade.php -->
<nav>
    <img src="{{ asset('imgs/logo.png') }}" alt="Logo Pokémon">
    <p>PokeShop</p>
    <a href="{{ url('/') }}">🏠 Inicio</a>
    <a href="gestion-cartas.php">📝 Gestión de cartas</a> <!-- Aprobar/rechazar cartas en venta, editar o eliminar listados. -->
    <a href="gestion-usuarios.php"> 🛠️ Gestión de Usuarios</a> <!-- Agregar, editar, suspender o eliminar usuarios. -->
    <a href="perfil-admin.php">👤 Perfil</a>
    <a href="{{ route('logout') }}" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</nav>