<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anuncios en Categoría:') }}
        </h2>
    </x-slot>

    <div class="relative w-full overflow-hidden">
        <!-- Imagen de cabecera -->
        <div class="w-full h-auto min-h-[150px] sm:min-h-[200px] md:min-h-[250px] lg:min-h-[300px]">
            <img src="{{ $categoria->cabecera ? asset('images/cabecerascat/' . $categoria->cabecera) : asset('images/cabecerascat/predeterminada.png') }}" 
                class="w-full h-full object-cover"
                alt="Imagen de {{ $categoria->descripcion }}">
        </div>
    </div>

    <!-- Controles (Ícono de categoría y botón de regresar) -->
    <div class="flex justify-between items-center mt-4 px-4">
        <!-- Ícono de la categoría (SIEMPRE visible, con fondo translúcido) -->
        <div class="bg-white/80 p-2 rounded-full shadow-md flex items-center justify-center">
            @if ($categoria->icono)
                <img src="{{ asset('storage/' . $categoria->icono) }}" class="w-8 h-8" alt="Icono de {{ $categoria->descripcion }}">
            @else
                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M8 3v4M16 3v4M3 11h18" />
                </svg>
            @endif
        </div>

        <!-- Botón para regresar (Solo icono en móviles, con texto en pantallas grandes) -->
        <a href="{{ route('home') }}" 
            class="bg-white/80 px-3 py-2 rounded-lg shadow-md hover:bg-gray-100 flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l7-7m0 0l7 7m-7-7v14" />
            </svg>
            <span class="hidden md:inline text-gray-700 font-semibold">Regresar</span>
        </a>
    </div>

    <livewire:vacantes-por-categoria :categoria="$categoria" />
</x-app-layout>
