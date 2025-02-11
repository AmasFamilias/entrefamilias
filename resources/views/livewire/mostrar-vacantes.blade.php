<div>
    <div class="space-y-6">
        @forelse ($vacantes as $vacante) 
            <!-- Tarjeta de Vacante -->
            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden group"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 50)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <div class="p-8 flex flex-col md:flex-row gap-8">
                    <!-- Contenido Principal -->
                    <div class="flex-1 space-y-4">
                        <!-- Encabezado -->
                        <div class="space-y-2">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" 
                               class="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition-colors duration-200">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-lg font-semibold text-gray-600">
                                {{ $vacante->entidad }}
                            </p>
                            
                            <!-- Organización -->
                            @if($vacante->organizacion_id)
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-800 rounded-full">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m5 18h5m-2-2v4" />
                                </svg>
                                Organización: {{ $vacante->organizacion->nombre }}
                            </div>
                            @endif

                            <!-- Caducidad del Anuncio -->    
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Caducidad de Anuncio: {{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                            </div>
                        </div>

                        <!-- Detalles Adicionales -->
                        <div class="space-y-3">
                            @if($vacante->descripcion)
                            <p class="text-gray-700 leading-relaxed">
                                {{ Str::limit($vacante->descripcion, 150) }}
                            </p>
                            @endif
                        
                            <!-- Categoría -->
                            @if($vacante->categoria_id)
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-orange-100 text-orange-800 rounded-full">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                                </svg>
                                Categoría: {{ $vacante->categoria->descripcion }}
                            </div>
                            @endif

                            <!-- Tipo de Anuncio -->
                            @if($vacante->tipoanuncio_id)
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-teal-100 text-teal-800 rounded-full ml-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Tipo: {{ $vacante->tipoanuncio->descripcion }}
                            </div>
                            @endif
                            
                            <div class="flex flex-wrap gap-2">
                                <!-- Presencial -->
                                @if($vacante->presencial == 1)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Presencial
                                </span>
                                @endif
                        
                                <!-- Virtual -->
                                @switch($vacante->virtual)
                                    @case(1)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Virtual
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                            </svg>
                                            Híbrido
                                        </span>
                                        @break
                                    @case(0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            No Virtual
                                        </span>
                                        @break
                                @endswitch

                                <!-- Evento y Fecha -->
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
                                    
                            <!-- Mostrando Etiquetas -->
                            @if(!empty($vacante->etiquetas) && is_array($vacante->etiquetas))
                                <div class="flex flex-wrap gap-2">
                                    @foreach($vacante->etiquetas as $etiqueta)
                                        <span class="px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                                            #{{ $etiqueta }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Publicado hace -->
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Publicado hace: {{ $vacante->created_at->diffForHumans() }}
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-4">
                            <a href="{{ route('candidatos.index', $vacante) }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                {{ $vacante->candidatos->count() }} Candidatos
                            </a>
                            <a href="{{ route('vacantes.edit', $vacante->id) }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                Editar
                            </a>
                            <button 
                                wire:confirm="¿Estás seguro de querer eliminar esta oportunidad?\n\nEsta acción no se puede deshacer."
                                wire:click="eliminarVacante({{ $vacante->id }})" 
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Eliminar
                            </button>
                        </div>
                    </div>

                    {{-- Imagen --}}
                    <div class="w-full md:w-80 relative overflow-hidden rounded-xl transition-transform duration-300 hover:scale-95">
                        <img 
                            src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                            alt="{{ 'Imagen vacante ' . $vacante->titulo }}" 
                            class="w-full h-64 object-cover"
                            loading="lazy"
                        > 
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center p-8 bg-white rounded-xl border-2 border-dashed border-gray-200">
                <p class="text-gray-500">No hay Anuncios disponibles</p>
            </div>
        @endforelse

        {{-- Paginacion Estilo Tailwind --}}
        <div class="mt-8">
            {{ $vacantes->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>