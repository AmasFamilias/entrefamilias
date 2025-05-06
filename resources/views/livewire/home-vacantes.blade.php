<div class="py-12">
    <div class="max-w-7xl mx-auto px-4">
        @if (!$paginacion)
            @foreach ($categorias as $categoria) 
                <div class="mb-12 bg-white shadow-sm rounded-lg p-6">
                    <!-- ENCABEZADO DE LA CATEGORÍA -->
                    <div class="flex justify-between items-center">
                        <h3 class="flex items-center font-extrabold text-2xl md:text-3xl text-gray-700">
                            <!-- Ícono de la categoría -->
                            @if (!empty($categoria->icono))
                                <img src="{{ asset('images/iconoscat/' . $categoria->icono) }}" class="w-10 h-10 mr-2" alt="Icono de {{ $categoria->descripcion }}">
                            @else
                                <svg class="w-10 h-10 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                                </svg>
                            @endif
                            {{ $categoria->descripcion }}
                        </h3>

                        <!-- Ver más -->
                        <a href="{{ route('vacantes.categoria', ['categoria' => $categoria->id]) }}"
                        class="text-indigo-500 hover:text-indigo-700 transition font-semibold">
                            Ver más {{ $categoria->descripcion }} →
                        </a>
                    </div>


                    <!-- LISTADO DE VACANTES -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                        @forelse ($vacantesPorCategoria[$categoria->id] ?? [] as $vacante)
                            <div class="relative bg-white shadow-lg rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105">
                                <!-- Imagen del anuncio -->
                                <div class="w-full relative overflow-hidden rounded-t-xl">
                                    <img 
                                        src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                                        alt="Imagen vacante {{ $vacante->titulo }}" 
                                        class="w-full h-56 object-cover transition-opacity duration-300 hover:opacity-90"
                                        loading="lazy"
                                    > 
                                </div>

                                <!-- Tipo de modalidad en la esquina superior izquierda -->
                                <div class="absolute top-3 left-3">
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

                                <!-- Contenido de la vacante -->
                                <div class="p-4">
                                    <h2 class="text-lg font-bold text-gray-800">
                                        {{ $vacante->titulo }}
                                    </h2>
                                    <p class="text-gray-600 text-sm mt-2 min-h-[60px] line-clamp-3">
                                        {{ Str::limit($vacante->descripcion, 150) }}
                                    </p>

                                    <!-- Evento y Fecha -->
                                    <div class="mt-4">
                                        @if($vacante->evento && $vacante->fecha_evento)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8"/>
                                                </svg>
                                                Evento: {{ $vacante->fecha_evento->format('d/m/Y') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mt-auto pt-4">
                                        <a href="{{ route('vacantes.show', $vacante->id) }}" 
                                        class="block bg-indigo-500 hover:bg-indigo-600 transition-colors px-4 py-2 text-center text-white font-bold rounded-lg shadow">
                                            🔍 Ver Detalles
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Si no hay vacantes disponibles -->
                            <div class="col-span-4 text-center p-8 bg-white rounded-xl border-2 border-dashed border-gray-200">
                                <p class="text-gray-500 text-lg font-semibold">😕 No hay Anuncios disponibles</p> 
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
