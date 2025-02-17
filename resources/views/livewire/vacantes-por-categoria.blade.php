<!-- Sección de Vacantes -->
<div class="w-full px-4 sm:px-6 lg:px-8 mt-6 sm:mt-8">
    <!-- Contenedor de Vacantes -->
<div class="w-full px-4 sm:px-6 lg:px-8 mt-6 sm:mt-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($vacantes as $vacante)
            <div class="relative bg-white shadow-lg rounded-xl overflow-hidden transition-transform duration-300 hover:scale-[1.03] flex flex-col h-full">
                
                <!-- Imagen de la vacante -->
                <div class="w-full relative overflow-hidden rounded-t-xl">
                    <img 
                        src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                        alt="Imagen vacante {{ $vacante->titulo }}" 
                        class="w-full h-64 object-cover transition-opacity duration-300 hover:opacity-90"
                        loading="lazy"
                    > 
                </div>

                <!-- Etiquetas de Presencialidad -->
                <div class="absolute top-3 left-3 space-y-1">
                    @if($vacante->presencial == 1)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-green-100 text-green-800 font-semibold shadow">
                            📍 Presencial
                        </span>
                    @endif

                    @switch($vacante->virtual)
                        @case(1)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-800 font-semibold shadow">
                                💻 Virtual
                            </span>
                            @break
                        @case(2)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800 font-semibold shadow">
                                🔄 Híbrido
                            </span>
                            @break
                        @case(0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-800 font-semibold shadow">
                                🚫 No Virtual
                            </span>
                            @break
                    @endswitch
                </div>

                <!-- Información de la vacante -->
                <div class="p-4 flex flex-col flex-grow">
                    <h2 class="text-lg font-bold text-gray-800 truncate">{{ $vacante->titulo }}</h2>

                    <!-- Descripción con altura mínima -->
                    <p class="text-gray-600 text-sm mt-2 min-h-[60px] line-clamp-3">
                        {{ Str::limit($vacante->descripcion, 150) }}
                    </p>

                    <!-- Evento -->
                    @if($vacante->evento && $vacante->fecha_evento)
                        <div class="mt-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8"/>
                                </svg>
                                Evento: {{ $vacante->fecha_evento->format('d/m/Y') }}
                            </span>
                        </div>
                    @endif

                    <!-- Botón de Ver Detalles siempre alineado abajo -->
                    <div class="mt-auto pt-4">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" 
                            class="block bg-indigo-500 hover:bg-indigo-600 transition-colors px-4 py-2 text-center text-white font-bold rounded-lg shadow w-full">
                            🔍 Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center p-8 bg-white rounded-xl border-2 border-dashed border-gray-200 col-span-full">
                <p class="text-gray-500 text-lg font-semibold">😕 No hay Anuncios disponibles</p> 
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $vacantes->links() }}
    </div>
</div>
