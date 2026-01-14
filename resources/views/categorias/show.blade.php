<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anuncios en Categoría:') }}
        </h2>
    </x-slot>

    <div class="relative w-full overflow-hidden">
        <!-- Imagen de cabecera -->
        @php
            // Obtener la URL segura de la cabecera usando el helper
            $cabeceraUrl = categoria_cabecera_url($categoria->cabecera, $categoria->descripcion);
        @endphp
        <div class="w-full h-auto min-h-[150px] sm:min-h-[200px] md:min-h-[250px] lg:min-h-[300px] bg-gradient-to-r from-amber-500 via-amber-600 to-slate-800 relative">
            @if($cabeceraUrl)
                <img src="{{ $cabeceraUrl }}" 
                    class="w-full h-full object-cover"
                    alt="Imagen de {{ e($categoria->descripcion) }}"
                    loading="eager"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            @endif
            <!-- Overlay con nombre de categoría (siempre visible como fallback o si la imagen falla) -->
            <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-r from-amber-500/80 via-amber-600/80 to-slate-800/80 {{ $cabeceraUrl ? 'opacity-0 hover:opacity-100' : 'opacity-100' }} transition-opacity duration-300" style="{{ !$cabeceraUrl ? 'display: flex;' : '' }}">
                <div class="text-center text-white px-4">
                    <svg class="w-16 h-16 mx-auto mb-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-lg font-semibold">{{ e($categoria->descripcion) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Controles (Ícono de categoría y botón de regresar) -->
    <div class="flex justify-between items-center mt-4 px-4">
        <!-- Ícono de la categoría (SIEMPRE visible, con fondo translúcido) -->
        @php
            // Obtener la URL segura del icono usando el helper
            $iconoUrl = categoria_icono_url($categoria->icono, $categoria->descripcion);
        @endphp
        <div class="bg-white/80 p-2 rounded-full shadow-md flex items-center justify-center">
            @if ($iconoUrl)
                <img src="{{ $iconoUrl }}" 
                    class="w-12 h-12" 
                    alt="Icono de {{ e($categoria->descripcion) }}"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <svg class="w-12 h-12 text-gray-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 3v4M16 3v4M3 11h18"/>
                </svg>
            @else
                <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 3v4M16 3v4M3 11h18"/>
                </svg>
            @endif
        </div>
    
        <!-- Botón para regresar -->
        <a href="{{ route('home') }}"
           class="bg-white/80 px-3 py-2 rounded-lg shadow-md hover:bg-gray-100 flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l7-7m0 0l7 7m-7-7v14"/>
            </svg>
            <span class="hidden md:inline text-gray-700 font-semibold">Regresar</span>
        </a>
    </div>
    
    

    <livewire:vacantes-por-categoria :categoria="$categoria" />
</x-app-layout>
