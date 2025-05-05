<div class="p-6 md:p-10">
    <div class="mb-6 flex items-center justify-between">
        <!-- Título del Anuncio -->
        <h3 class="font-extrabold text-4xl text-gray-900 flex items-center">
            {{ $vacante->titulo }}
        </h3>

        <!-- Botones de Compartir -->
        <div class="flex items-center gap-2 sm:gap-3">
            <span class="hidden sm:inline text-sm text-gray-600 font-medium">Compartir:</span>
            <!-- Compartir por Email -->
            <a href="mailto:?subject={{ urlencode($vacante->titulo) }}&body={{ urlencode('Mira este anuncio: ' . request()->url()) }}" 
               class="group relative flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-100 hover:bg-indigo-100 transition-all duration-300"
               title="Compartir por correo electrónico">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600 group-hover:text-indigo-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Compartir por email
                </span>
            </a>

            <!-- Compartir por WhatsApp -->
            <a href="https://wa.me/?text={{ urlencode('Mira este anuncio: ' . request()->url()) }}" 
               target="_blank"
               class="group relative flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-100 hover:bg-green-100 transition-all duration-300"
               title="Compartir por WhatsApp">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600 group-hover:text-green-600 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Compartir por WhatsApp
                </span>
            </a>
        </div>
    </div>

    <div class="md:grid md:grid-cols-3 gap-8">
        <!-- Lado Izquierdo: Información del Anuncio -->
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <!-- Imagen -->
            <div class="mb-6 overflow-hidden rounded-lg">
                <img class="rounded-lg w-full object-cover hover:scale-105 transition-transform duration-300" 
                     src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                     alt="Imagen de la Vacante">
            </div>

            <!-- Descripción Larga -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2 text-gray-800">Descripción del Anuncio:</h2>
                <p class="text-gray-600 leading-relaxed">{{ $vacante->descrip_larga }}</p>
            </div>

            <!-- Información Adicional -->
            <div class="space-y-2">
                @if($vacante->evento && $vacante->fecha_evento)
                    <div class="flex flex-wrap items-center gap-2 px-4 py-2 bg-purple-100 text-purple-800 rounded-lg text-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="break-words"><strong>Fecha del Evento:</strong> {{ $vacante->fecha_evento->format('d/m/Y') }}</span>
                    </div>
                @endif

                @if($vacante->tipoanuncio_id)
                    <div class="flex flex-wrap items-center gap-2 px-4 py-2 bg-teal-100 text-teal-800 rounded-lg text-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="break-words"><strong>Tipo:</strong> {{ $vacante->tipoanuncio->descripcion }}</span>
                    </div>
                @endif

                <!-- Modalidad de Trabajo -->
                @if($vacante->presencial || $vacante->virtual)
                    <div class="p-4 bg-gray-100 rounded-lg text-sm">
                        <h3 class="font-semibold text-gray-800 mb-2">Lugar y Estilo de Trabajo:</h3>
                        <div class="space-y-2">
                            @if($vacante->presencial)
                                <div class="flex flex-wrap items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>Presencial</span>
                                    @auth
                                        @if($vacante->lugar)
                                            <span class="ml-2 text-gray-600">({{ $vacante->lugar }})</span>
                                        @endif
                                    @endauth
                                </div>
                            @endif

                            @if($vacante->virtual == 1 || $vacante->virtual == 2)
                                <div class="flex flex-wrap items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>
                                        @if($vacante->virtual == 1)
                                            Virtual
                                        @elseif($vacante->virtual == 2)
                                            Híbrido
                                        @endif
                                    </span>

                                    @auth
                                        @if($vacante->enlace)
                                            <span class="ml-2 break-all">
                                                <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10H9a3 3 0 00-3 3v4a3 3 0 003 3h6a3 3 0 003-3v-4a3 3 0 00-3-3h-1m0 0V5a3 3 0 00-3-3H8a3 3 0 00-3 3v4m3-4h3"/>
                                                </svg>
                                                <a href="{{ $vacante->enlace }}" target="_blank" class="text-blue-600 underline break-all">
                                                    {{ $vacante->enlace }}
                                                </a>
                                            </span>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Categoría -->
                @if($vacante->categoria_id)
                    <div class="flex flex-wrap items-center gap-2 px-4 py-2 bg-orange-100 text-orange-800 rounded-lg text-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="break-words"><strong>Categoría:</strong> {{ $vacante->categoria->descripcion }}</span>
                    </div>
                @endif
            </div>

            <!-- Mostrando Etiquetas -->
            <div class="mt-6 text-gray-700"> 
                @if (!empty($etiquetas) && is_array($etiquetas))
                    <div class="flex flex-wrap gap-2">
                        @foreach ($etiquetas as $index => $etiqueta)
                            <span class="px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                                #{{ $etiqueta }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Último día disponible -->
            <div class="mt-6 text-gray-700">
                <p class="font-bold text-sm uppercase">Último día disponible: 
                    <span class="font-normal normal-case">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                </p>
            </div>
        </div>

        <!-- Lado Derecho: Información del Usuario -->
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            @guest
                <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
                    <p>
                        ¿Te interesa este anuncio?  
                        <a class="font-bold text-indigo-600 hover:underline" 
                        href="{{ route('login', ['redirect' => request()->fullUrl()]) }}">
                            Inicia sesión para ponerte en contacto.
                        </a>
                    </p>
                </div>
            @endguest

            @can('postular', $vacante)
                <livewire:postular-vacante :vacante="$vacante" />
            @endcan

            <!-- Información del Usuario u Organización -->
            <div class="text-center">
                @if($vacante->organizacion_id)
                    <!-- Información de la Organización -->
                    <img class="w-20 h-20 rounded-full mx-auto" 
                        src="{{ $vacante->organizacion->imagen ? asset('storage/' . $vacante->organizacion->imagen) : asset('images/perfil_ong.png') }}" 
                        alt="Logo de {{ $vacante->organizacion->nombre }}">

                    <h3 class="text-lg font-bold mt-3">{{ $vacante->organizacion->nombre }}</h3>
                    @if($vacante->organizacion?->descripcion)
                        <div class="mt-6 bg-gray-50 border-l-4 border-indigo-500 p-4 rounded-lg shadow-sm">
                            <h4 class="text-indigo-700 font-semibold text-lg mb-2">¿Quiénes Somos?</h4>
                            <p class="text-gray-700 text-justify leading-relaxed">{{ $vacante->organizacion->descripcion }}</p>
                        </div>
                    @endif

                    @if($vacante->organizacion->web)
                        <a href="{{ Str::startsWith($vacante->organizacion->web, ['http://', 'https://']) ? $vacante->organizacion->web : 'https://' . $vacante->organizacion->web }}" 
                        target="_blank" 
                        class="mt-2 inline-block text-indigo-600 hover:text-indigo-800 text-sm font-semibold">
                            Visitar sitio web
                        </a>
                    @endif


                    <p class="text-gray-500 mt-3 text-sm">Creado por: {{ $vacante->entidad }}</p>

                @else
                    <!-- Información del Usuario -->
                    <div class="text-center">
                        <img class="w-20 h-20 rounded-full mx-auto" 
                            src="{{ $vacante->users?->profile_photo_url }}" 
                            alt="Foto de {{ $vacante->users?->name ?? 'Usuario desconocido' }}">

                        <h3 class="text-lg font-bold mt-3">{{ $vacante->users?->name ?? 'Usuario desconocido' }}</h3>
                    </div>

                    <!-- Sobre mí -->
                    @if($vacante->users?->sobremi)
                        <div class="mt-6 bg-gray-50 border-l-4 border-indigo-500 p-4 rounded-lg shadow-sm">
                            <h4 class="text-indigo-700 font-semibold text-lg mb-2">Sobre mí</h4>
                            <p class="text-gray-700 text-justify leading-relaxed">{{ $vacante->users?->sobremi }}</p>
                        </div>
                    @endif

                    <livewire:insignias modo="vacante" propietario_id="{{ $vacante->user_id }}" />
                @endif
            </div>

            <!-- Publicado hace -->
            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Publicado hace: {{ $vacante->created_at->diffForHumans() }}
            </div>
        </div>
    </div>    
</div>  
