<form class="md:w-full space-y-5" wire:submit.prevent='crearVacante'>

    <!-- Encabezado del Formulario -->
    <div class="text-center flex items-center justify-center">
        <div class="mr-4">
            <img src="{{ asset('images/oportunidad.png') }}" alt="Icono" class="w-16 h-16">
        </div>
        <h2 class="text-2xl font-semibold text-gray-800">PUBLICAR ANUNCIO</h2>
    </div>

    <!-- Contenedor de los Campos del Formulario -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 gap-y-4">

        <!-- Título del Anuncio -->
        <div>
            <x-input-label for="titulo" :value="__('Titulo del Anuncio')" class="mb-2" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo del Anuncio" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- Nombre del Anunciante -->
        <div>
            <x-input-label for="entidad" :value="__('Nombre Anunciante')" class="mb-2" />
            <x-text-input id="entidad" class="block mt-1 w-full bg-gray-100 cursor-not-allowed" type="text" readonly wire:model="entidad" :value="old('entidad')" placeholder="Nombre de la Entidad que publica el Anuncio" />
            <x-input-error :messages="$errors->get('entidad')" class="mt-2" />
        </div>

       <!-- Organización Existente -->
        @auth
            @if (auth()->user()->organizaciones->isNotEmpty()) {{-- Verifica si el usuario tiene organizaciones asignadas --}}
                <div>
                    <x-input-label for="organizacion" :value="__('Seleccionar Organización')" class="mb-2" />
                    <select id="organizacion" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-200 hover:border-indigo-400" 
                    wire:model="selectedOrganizacion">
                        <option value="">{{ __('Sin Organización') }}</option> {{-- Permite no seleccionar ninguna --}}
                        @foreach ($orgexistentes as $organizacion)
                            <option value="{{ $organizacion->id }}">{{ $organizacion->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('selectedOrganizacion')" class="mt-2" />
                </div>
            @endif
        @endauth


        <!-- Descripciones -->
        <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Descripción Breve -->
            <div x-data="{ charCount: 0 }" x-init="charCount = $el.querySelector('textarea').value.length">
                <textarea 
                    wire:model="descripcion"
                    id="descripcion"
                    placeholder="Haz una descripción breve..."
                    maxlength="150"
                    x-on:input="charCount = $event.target.value.length"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 w-full h-32 resize-none px-4 py-2 text-sm"
                ></textarea>
                <div class="text-right text-sm mt-1">
                    <span x-text="charCount" :class="charCount > 140 ? 'text-red-800 font-nexabold' : 'text-gray-500'"></span>/150
                </div>
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>

            <!-- Descripción Detallada -->
            <div>
                <x-input-label for="descrip_larga" :value="__('Descripción Detallada del Anuncio')" class="mb-2" />
                <textarea wire:model="descrip_larga" id="descrip_larga" placeholder="Haz una descripción detallada del Anuncio" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 w-full h-72 resize-y px-4 py-2 text-sm"></textarea>
                <x-input-error :messages="$errors->get('descrip_larga')" class="mt-2" />
            </div>
        </div>

        <!-- Presencialidad -->
        <div>
            <x-input-label for="presencial" :value="__('Requiere Presencialidad')" class="mb-2" />
            <p class="text-sm text-gray-500">
                Especifica si este anuncio requiere que los participantes estén presentes físicamente.
            </p>
            <select wire:model="presencial" id="presencial" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-200 hover:border-indigo-400">
                <option value="">--Selecciona una opción--</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            <x-input-error :messages="$errors->get('presencial')" class="mt-2" />
        </div>

        <!-- Virtualidad -->
        <div>
            <x-input-label for="virtual" :value="__('¿Es Virtual?')" class="mb-2" />
            <p class="text-sm text-gray-500">
                Indica si este anuncio corresponde a una actividad que se realizará en línea.
            </p>
            <select wire:model="virtual" id="virtual" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-200 hover:border-indigo-400">
                <option value="">--Selecciona una opción--</option>
                <option value="1">Sí, es Virtual</option>
                <option value="0">No, es Presencial</option>
                <option value="2">Híbrido</option>
            </select>
            <x-input-error :messages="$errors->get('virtual')" class="mt-2" />
        </div>

        <!-- Indicar si es un Evento o no -->
        <div>
            <x-input-label for="evento" :value="__('¿Es un Evento?')" class="mb-2" />
            <p class="text-sm text-gray-500">
                Indica si el anuncio es para un evento.
            </p>
            <select wire:model.live="evento" id="evento"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 hover:border-indigo-400">
                <option value="">--Selecciona una opción--</option> 
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            
            <x-input-error :messages="$errors->get('evento')" class="mt-2" />
        </div>
        
        <!-- Si es un evento, Solicitar la fecha -->
        @if ($evento === '1') 
            <div class="mt-4">
                <x-input-label for="fecha_evento" :value="__('Fecha de Evento')" class="mb-2" />
                <p class="text-sm text-gray-500">
                    Seleccione una fecha para este evento.
                </p>
                <x-text-input 
                    id="fecha_evento" 
                    class="block mt-1 w-full" 
                    type="date" 
                    wire:model="fecha_evento" 
                />
                <x-input-error :messages="$errors->get('fecha_evento')" class="mt-2" />
            </div>
        @endif

        <!-- Categoría -->
        <div>
            <x-input-label for="categoria_id" :value="__('Categoria')" class="mb-2" />
            <select wire:model="categoria_id" id="categoria_id" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-200 hover:border-indigo-400">
                <option>--Selecciona una Categoria--</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
        </div>

        <!-- Tipo de Anuncio -->
        <div>
            <x-input-label for="tipoanuncio_id" :value="__('Tipo de Anuncio')" class="mb-2" />
            <select wire:model="tipoanuncio_id" id="tipoanuncio_id" 
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-200 hover:border-indigo-400">
                <option>--Selecciona Tipo de Anuncio--</option>
                @foreach ($tiposanuncios as $tipoanuncio)
                    <option value="{{ $tipoanuncio->id }}">{{ $tipoanuncio->descripcion }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('tipoanuncio_id')" class="mt-2" />
        </div>

        <!-- Último día de Postulación -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Fecha caducidad del Anuncio')" class="mb-2" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <!-- Ingreso de Etiquetas -->
        <div>
            <x-input-label for="nuevaEtiqueta" :value="__('Etiquetas')" class="mb-2" />
            <!-- Input para agregar nuevas etiquetas -->
            <input 
                id="nuevaEtiqueta"
                type="text" 
                placeholder="Escribe y presiona espacio..."
                wire:model="nuevaEtiqueta"
                wire:keydown.space.prevent="agregarEtiqueta"
                wire:keydown.enter.prevent="agregarEtiqueta"
                class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring focus:ring-indigo-300 outline-none"
            >
        
            <!-- Mostrar etiquetas existentes -->
            <div class="flex flex-wrap gap-2 mb-2 p-2 border border-gray-300 rounded-lg overflow-y-auto max-h-32">
                @forelse($etiquetas as $index => $etiqueta)
                    <div class="bg-indigo-600 text-white px-3 py-1 rounded-full flex items-center gap-2">
                        <span>{{ $etiqueta }}</span>
                        <button 
                            type="button" 
                            wire:click="eliminarEtiqueta({{ $index }})"
                            class="text-white hover:text-red-200"
                        >
                            ×
                        </button>
                    </div>
                @empty
                    <!-- Mensaje si no hay etiquetas -->
                    <p class="text-gray-500 text-sm">No hay etiquetas agregadas.</p>
                @endforelse
            </div>
        </div>

        <!-- Contenedor principal de imagen -->
        <div class="relative" x-data="{ isUploading: false }" 
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false">

            <!-- Área de carga (se muestra solo cuando no hay imagen) -->
            <div class="{{ $imagen && !$errors->has('imagen') ? 'hidden' : 'block' }}">
                <x-input-label for="imagen" :value="__('Imagen destacada')" />
                
                <div class="mt-1 group relative cursor-pointer rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition-all duration-200 hover:border-indigo-500 hover:bg-indigo-50">
                    <div class="flex h-40 items-center justify-center p-6 text-center">
                        <div class="space-y-2">
                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                            </svg>
                            <div class="text-sm text-gray-600 group-hover:text-indigo-700">
                                <span class="font-medium">Haz clic para subir</span>
                                <span class="hidden sm:inline"> o arrastra una imagen</span>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG o JPEG hasta 3MB</p>
                        </div>
                    </div>
                    
                    <input 
                        id="imagen" 
                        type="file" 
                        wire:model.live="imagen"
                        class="absolute inset-0 h-full w-full cursor-pointer opacity-0"
                        accept="image/jpeg, image/png, image/jpg"
                        @change="const file = $event.target.files[0]; 
                            if (file && !['image/jpeg','image/png','image/jpg'].includes(file.type)) {
                                alert('Solo se permiten imágenes (JPEG, PNG, JPG)');
                                $event.target.value = null;
                            }"
                    >
                </div>
            </div>

        <!-- Vista previa superpuesta en el mismo espacio -->
        @if ($imagen && !$errors->has('imagen'))
            <div class="relative mt-1 h-40 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <!-- Imagen con efecto hover -->
                <div class="relative h-full w-full">
                    <img 
                        src="{{ $imagen->temporaryUrl() }}" 
                        alt="Vista previa" 
                        class="h-full w-full object-contain p-2"
                    >
                    
                    <!-- Overlay de acciones -->
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 transition-all duration-300 hover:bg-opacity-20">
                        <button 
                            type="button" 
                            wire:click="eliminarImagen"
                            class="flex items-center rounded-full bg-white/90 p-1.5 text-red-600 shadow-lg hover:bg-white hover:text-red-700"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            
                <!-- Información del archivo -->
                <div class="absolute bottom-0 left-0 right-0 bg-white/90 px-3 py-1.5 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="truncate font-medium">{{ $imagen->getClientOriginalName() }}</span>
                        <span>{{ round($imagen->getSize() / 1024) }}KB</span>
                    </div>
                </div>
            </div>
            @endif

            <!-- Mensaje de error -->
            @error('imagen')
                <div class="mt-2 flex items-start rounded-lg bg-red-50 p-3 text-red-600">
                    <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                    <div class="ml-3">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
            @enderror

            <!-- Indicador de carga -->
            <div wire:loading wire:target="imagen" 
                class="absolute inset-0 flex items-center justify-center rounded-lg bg-white/80 backdrop-blur-sm">
                <div class="flex items-center space-x-2 text-indigo-600">
                    <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-sm font-medium">Subiendo imagen...</span>
                </div>
            </div>
        </div>

        <!-- Botón de Crear Anuncio -->
        <div class="col-span-1 md:col-span-2 flex justify-center mt-4 w-full">
            <x-primary-button class="bg-red-500 px-8 py-2" wire:loading.attr="disabled">
                {{ __('Crear Anuncio') }}
                <div 
                    wire:loading wire:target="crearVacante"
                    class="inline-block h-4 w-4 ml-2 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </div>
</form>