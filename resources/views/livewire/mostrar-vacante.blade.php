<div class="p-10">
    <div class="mb-5 flex items-center justify-between">
        <!-- Título de la Anuncio -->
        <h3 class="font-bold text-3xl text-gray-800 my-3 flex items-center">
            {{ $vacante->titulo }}
        </h3>

        <!-- Otras secciones de información -->
    </div>

    <div class="p-10 md:grid md:grid-cols-3 gap-6">
        <!-- Lado Izquierdo: Información del Anuncio -->
        <div class="md:col-span-2 bg-gray-50 p-6 rounded-lg shadow">

            <div class="grid grid-cols-2 gap-4 text-gray-700">
                <p class="font-bold text-sm uppercase">Empresa: 
                    <span class="font-normal normal-case">{{ $vacante->entidad }}</span>
                </p>

                <p class="font-bold text-sm uppercase">Último día disponible: 
                    <span class="font-normal normal-case">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                </p>

                <p class="font-bold text-sm uppercase">Categoría: 
                    <span class="font-normal normal-case">{{ $vacante->categoria->descripcion }}</span>
                </p>
            </div>

            <!-- Imagen -->
            <div class="my-6">
                <img class="rounded-lg w-full object-cover" 
                     src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                     alt="Imagen de la Vacante">
            </div>

            <!-- Descripción -->
            <div>
                <h2 class="text-2xl font-bold mb-2">Descripción de Anuncio:</h2>
                <p>{{ $vacante->descripcion }}</p>
            </div>

            <!-- Etiquetas -->
            @if(!empty($vacante->etiquetas) && is_array($vacante->etiquetas))
                <div class="mt-4 flex flex-wrap gap-2">
                    @foreach($vacante->etiquetas as $etiqueta)
                        <span class="px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                            #{{ $etiqueta }}
                        </span>
                    @endforeach
                </div>
            @endif

            <!-- Tipo de Anuncio -->
            @if($vacante->tipoanuncio_id)
                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-teal-100 text-teal-800 rounded-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Tipo: {{ $vacante->tipoanuncio->descripcion }}
                </div>
            @endif
        </div>

        <!-- Lado Derecho: Información del Usuario -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-center">
                <!-- Foto del Usuario -->
                <img class="w-20 h-20 rounded-full mx-auto" 
                     src="{{ $vacante->users?->profile_photo_url }}" 
                     alt="Foto de {{ $vacante->users?->name ?? 'Usuario desconocido' }}">

                <h3 class="text-lg font-bold mt-3">{{ $vacante->users?->name ?? 'Usuario desconocido' }}</h3>
                <p class="text-gray-600">{{ $vacante->entidad }}</p>

                <!-- Organización -->
                @if($vacante->organizacion_id)
                    <div class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-800 rounded-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 10h11M9 21V3m5 18h5m-2-2v4"/>
                        </svg>
                        Organización: {{ $vacante->organizacion->nombre }}
                    </div>
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

            <!-- Botón para Contactar -->
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
        </div>
    </div>    
</div>  
