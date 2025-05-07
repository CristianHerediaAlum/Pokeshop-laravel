<!-- resources/views/layouts/nav.blade.php -->
<nav>
    <img src="{{ asset('imgs/logo.png') }}" alt="Logo Pokémon">
    <p>PokeShop</p>
    <a href="{{ url('/') }}">🏠 Inicio</a>
    <a href="{{ route('comprar.index') }}">🛒 Comprar</a>
    <a href="{{ route('vender.index')  }}">📦 Vender</a>
    <a href="{{ route('carrito.index') }}">🛍️ Carrito</a>
    <a href="{{ route('coleccion.index') }}">🎴 Mi Colección</a>
    <a href="{{ route('perfil.index') }}">👤 Perfil</a>
    <a href="{{ route('logout') }}" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</nav>