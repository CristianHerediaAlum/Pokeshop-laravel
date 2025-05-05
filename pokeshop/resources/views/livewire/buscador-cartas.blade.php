{{-- buscador-cartas.blade.php --}}
{{-- <div>
    <input type="text" wire:model.live="busqueda" placeholder="Buscar carta..." class="buscador_input">

    <div class="contenedor_ventas_cartas">
        @foreach ($cartas as $carta)
            <article class="carta_pokemon" onclick="seleccionarCarta(this, {{ $carta->ID_Carta }});">
                <h2>{{ $carta->Nombre }}</h2>
                <img src="{{ asset($carta->Imagen) }}" alt="Imagen de la carta" width="200">
                <p>Tipo: {{ $carta->Tipo }}</p>
                <p>PS: {{ $carta->PS }}</p>
                <p>Ataque: {{ $carta->Ataque }}</p>
                <p>Precio: {{ $carta->Precio }} puntos</p>
                <input type="checkbox" name="cartas_seleccionadas[]" value="{{ $carta->ID_Carta }}" hidden>
            </article>
        @endforeach
    </div>
</div> --}}
<div>
    <div class="buscador_filtros">
        <input type="text" wire:model.live="busqueda" placeholder="Buscar carta..." class="buscador_input">

        <div class="filtros_extra">
            <div>
                <label>Precio entre {{ $precioMin }} y {{ $precioMax }}</label>
                <input type="range" wire:model.live="precioMin" min="0" max="1000">
                <input type="range" wire:model.live="precioMax" min="0" max="1000">
            </div>

            <div>
                <label>Ataque entre {{ $ataqueMin }} y {{ $ataqueMax }}</label>
                <input type="range" wire:model.live="ataqueMin" min="0" max="500">
                <input type="range" wire:model.live="ataqueMax" min="0" max="500">
            </div>

            <div>
                <label>PS entre {{ $psMin }} y {{ $psMax }}</label>
                <input type="range" wire:model.live="psMin" min="0" max="500">
                <input type="range" wire:model.live="psMax" min="0" max="500">
            </div>
            <div>
                <label>Tipo:</label>
                <select wire:model.live="tipo">
                    <option value="">Todos</option>
                    @foreach($tipos as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="contenedor_ventas_cartas">
        @foreach ($cartas as $carta)
            <article class="carta_pokemon" onclick="seleccionarCarta(this, {{ $carta->ID_Carta }});">
                <h2>{{ $carta->Nombre }}</h2>
                <img src="{{ asset($carta->Imagen) }}" alt="Imagen de la carta" width="200">
                <p>Tipo: {{ $carta->Tipo }}</p>
                <p>PS: {{ $carta->PS }}</p>
                <p>Ataque: {{ $carta->Ataque }}</p>
                <p>Precio: {{ $carta->Precio }} puntos</p>
                <input type="checkbox" name="cartas_seleccionadas[]" value="{{ $carta->ID_Carta }}" hidden>
            </article>
        @endforeach
    </div>
</div>
