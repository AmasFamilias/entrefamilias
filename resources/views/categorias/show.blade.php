<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tigh">
            {{ __('Anuncios en Categoria:') }}
        </h2>
    </x-slot>

   <!-- Cabecera de la Categoría -->
    <div class="relative w-full overflow-hidden">
        <div class="w-full h-auto min-h-[150px] sm:min-h-[200px] md:min-h-[250px] lg:min-h-[300px]">
            <img src="{{ $categoria->cabecera ? asset('images/cabecerascat/' . $categoria->cabecera) : asset('images/cabecerascat/predeterminada.png') }}" 
                class="w-full h-full object-cover"
                alt="Imagen de {{ $categoria->descripcion }}">
        </div>

        <!-- Icono de la categoría -->
        <div class="absolute top-4 left-4 bg-white p-2 rounded-full shadow-lg hover:shadow-xl transition-transform hover:scale-110">
            @if ($categoria->icono)
                <img src="{{ asset('storage/' . $categoria->icono) }}" 
                    class="w-16 h-16" 
                    alt="Icono de {{ $categoria->descripcion }}">
            @else
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 00-2-2H9a2 2 00-2 2v5a2 2 01-2 2z"/>
                </svg>
            @endif
        </div>

        <!-- Botón para regresar al Home -->
        <a href="{{ route('home') }}" 
            class="absolute top-4 right-4 bg-white text-gray-700 font-semibold px-4 py-2 rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-xl transition-transform hover:scale-110 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Regresar
        </a>
    </div>

    <livewire:vacantes-por-categoria :categoria="$categoria" />
    
</x-app-layout> 