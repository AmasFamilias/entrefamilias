<div class="md:w-full space-y-5">
    <header class="text-center mb-10">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/organizaciones.png') }}" alt="Icono Organizaciones" class="h-16 w-16">
        </div>
        <h2 class="font-nexabold text-2xl font-bold underline">
            {{ __('Gestionar Organizaciones') }}
        </h2>
        <p class="font-nexalight text-lg text-gray-700 mt-2">
            ¡Crea, edita o invita una organización!
        </p>
    </header>

    {{-- Mostrar mensaje de éxito --}} 
    @if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 5000)" 
        class="mt-2 text-indigo-500"
    >
        <div class="flex items-center">
            <!-- Ícono SVG de éxito en indigo -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 10-1.414-1.414L9 9.586 7.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <h4 class="font-bold text-indigo-500">¡Éxito!</h4>
        </div>
        <x-input-error :messages="session('success')" class="text-indigo-500 bg-indigo-100 border-indigo-500" />
    </div>
    @endif

    {{-- Mostrar mensaje de error --}}
    @if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 5000)" 
        class="mt-2 text-red-500"
    >
        <div class="flex items-center">
            <!-- Ícono SVG de error en rojo -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-red-500 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>                      
            <h4 class="font-bold text-red-500">¡Error!</h4>
        </div>
        <x-input-error :messages="session('error')" />
    </div>
    @endif

    {{-- Mostrar mensaje de advertencia --}}
    @if (session('warning'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 5000)" 
        class="mt-2 text-yellow-500"
    >
        <div class="flex items-center">
            <!-- Ícono SVG de advertencia en amarillo -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-yellow-500 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>                      
            <h4 class="font-bold text-yellow-500">¡Advertencia!</h4>
        </div>
        <x-input-error :messages="session('warning')" class="text-yellow-500 bg-yellow-100 border-yellow-500" />
    </div>
    @endif

   {{-- Botón de Agregar un Registro Nuevo --}}
    @auth
        @if (auth()->user()->rol == 2) {{-- Solo Administradores --}}
            <div class="p-4 flex mt-4 justify-center">
                <button 
                    class="relative group bg-gradient-to-r from-amber-500 via-amber-600 to-amber-500 text-white text-sm font-bold px-6 py-4 rounded-lg shadow-lg hover:scale-105 hover:shadow-2xl transition duration-300 cursor-pointer uppercase flex items-center gap-2"
                    wire:click="openCreateModal()"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                    </svg>
                    <span>{{ __('Agregar Organización') }}</span>
                </button>
            </div>  
        @endif
    @endauth

    <!-- Lista de Organizaciones -->
    <div class="font-museo300 bg-gray-100 py-8">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @forelse($organizations as $organizacion)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                    <div class="relative h-48">
                        <img src="{{ $organizacion->imagen ? asset('storage/' . $organizacion->imagen) : asset('images/perfil_ong.png') }}" 
                             alt="Imagen de la Organización" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <button wire:click="openCreateModal({{ $organizacion->id }})" 
                                    class="text-white bg-indigo-500/90 px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detalles
                            </button>
                        </div>
                    </div>
                        
                    <!-- Contenido --> 
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $organizacion->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($organizacion->descripcion, 100) }}</p>
                        
                        <!-- Botones -->
                        <div class="flex flex-wrap gap-3">
                            <button 
                                wire:click="openCreateModal({{ $organizacion->id }})" id="edit-btn-{{ $organizacion->id}}"
                                class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600 transition duration-300 flex items-center justify-center w-full sm:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                {{ __('Editar') }}
                            </button>
                            <button 
                                wire:click="openInvitarModal({{ $organizacion->id }})" 
                                class="bg-amber-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-amber-600 transition duration-300 flex items-center justify-center w-full sm:w-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>
                                {{ __('Invitar') }}
                            </button>
                        </div>
                        
                        <!-- Sección Colaboradores -->
                        @if($organizacion->users->where('pivot.role', 'colaborador')->isNotEmpty())
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    COLABORADORES
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($organizacion->users as $user)
                                        <div class="flex items-center bg-white border rounded-full px-3 py-1.5 shadow-sm hover:shadow-md transition-shadow">
                                            <img src="{{ $user->profile_photo_url }}" 
                                                class="w-6 h-6 rounded-full object-cover border-2 border-white shadow-sm">
                                            <span class="ml-2 text-sm text-gray-700 font-medium">{{ $user->name }}</span>
                                            @if($user->pivot->role === 'administrador')
                                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Admin</span>
                                            @else
                                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Colaborador</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="p-6 text-gray-500 col-span-full text-center bg-white rounded-lg shadow-md">
                        {{ __('No se encontraron organizaciones.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>

<!-- Modal de NUEVO, EDITAR Y ELIMINAR -->
@if ($modal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 px-4 py-10 z-50">
        <div class="max-h-full w-full max-w-3xl overflow-y-auto bg-white shadow-lg rounded-lg">
            <div class="relative">
                <!-- Botón de cierre -->
                <button wire:click.prevent="closeCreateModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Encabezado -->
                <div class="text-center py-6 bg-indigo-100 rounded-t-lg">
                    <h2 class="text-xl font-bold text-gray-700">
                        {{ $miOrganizacion?->id ? __('Editar Organización') : __('Agregar Organización') }}
                    </h2>
                </div>                

                <!-- Contenido -->
                <div class="p-8">
                    <form wire:submit.prevent="createOrAttachOrganization" method="POST">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre de la Organización')" />
                                <x-text-input id="nombre" name="nombre" type="text" wire:model="nombre" 
                                    class="border-gray-300 rounded-lg shadow-sm w-full"
                                    placeholder="Nombre de tu Organización" />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>

                            <!-- CIF -->
                            <div>
                                <x-input-label for="cif" :value="__('CIF')" />
                                <x-text-input id="cif" name="cif" type="text" wire:model="cif" 
                                    class="border-gray-300 rounded-lg shadow-sm w-full"
                                    placeholder="Código de Identificación Fiscal" />
                                <x-input-error :messages="$errors->get('cif')" class="mt-2" />
                            </div>

                            <!-- Descripción -->
                            <div class="col-span-full">
                                <x-input-label for="descripcion" :value="__('Descripción de la Organización')" />
                                <textarea id="descripcion" name="descripcion" wire:model="descripcion" 
                                    class="border-gray-300 rounded-lg shadow-sm w-full p-3 resize-none"
                                    placeholder="Describe a tu Organización"></textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>

                            <!-- Página Web -->
                            <div>
                                <x-input-label for="web" :value="__('Página Web')" />
                                <x-text-input id="web" type="text" wire:model="web" 
                                    class="border-gray-300 rounded-lg shadow-sm w-full"
                                    placeholder="URL del Sitio Web" />
                                <x-input-error :messages="$errors->get('web')" class="mt-2" />
                            </div>

                            <!-- Imagen --> 
                            <div class="space-y-4">
                                <!-- Contenedor principal de imagen -->
                                <div class="relative" x-data="{ isUploading: false }" 
                                     x-on:livewire-upload-start="isUploading = true"
                                     x-on:livewire-upload-finish="isUploading = false"
                                     x-on:livewire-upload-error="isUploading = false">
                                    
                                    <!-- Área de carga (se muestra solo cuando no hay imagen) -->
                                    <div class="{{ ($imagen || $currentImage) && !$errors->has('imagen') ? 'hidden' : 'block' }}">
                                        <x-input-label for="imagen" :value="__('Imagen de la Organización')" />
                                        
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
                                                    <p class="text-xs text-gray-500">PNG, JPG hasta 2MB</p>
                                                </div>
                                            </div>
                                            
                                            <input 
                                                id="imagen" 
                                                type="file" 
                                                wire:model.live="imagen"
                                                class="absolute inset-0 h-full w-full cursor-pointer opacity-0"
                                                accept="image/jpeg, image/png"
                                                @change="const file = $event.target.files[0]; 
                                                    if (file && !['image/jpeg','image/png'].includes(file.type)) {
                                                        alert('Solo se permiten imágenes JPG o PNG');
                                                        $event.target.value = null;
                                                    }"
                                            >
                                        </div>
                                    </div>
                            
                                    <!-- Vista previa superpuesta en el mismo espacio -->
                                    @if (($imagen || $currentImage) && !$errors->has('imagen'))
                                        <div class="relative mt-1 h-40 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                                            <!-- Imagen con efecto hover -->
                                            <div class="relative h-full w-full">
                                                @if($imagen)
                                                    <img 
                                                        src="{{ $imagen->temporaryUrl() }}" 
                                                        alt="Vista previa" 
                                                        class="h-full w-full object-contain p-2"
                                                    >
                                                @else
                                                    <img 
                                                        src="{{ asset('storage/' . $currentImage) }}" 
                                                        alt="Imagen actual" 
                                                        class="h-full w-full object-contain p-2"
                                                    >
                                                @endif
                                                
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
                                                    <span class="truncate font-medium">
                                                        @if($imagen)
                                                            {{ $imagen->getClientOriginalName() }}
                                                        @else
                                                            {{ basename($currentImage) }}
                                                        @endif
                                                    </span>
                                                    @if($imagen)
                                                        <span>{{ round($imagen->getSize() / 1024) }}KB</span>
                                                    @endif
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
                            </div>

                        @if ($miOrganizacion)
                            <!-- Sección Colaboradores -->
                            <div class="col-span-full mt-6 pt-4 border-t border-gray-200">
                                <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    COLABORADORES
                                </h4>
                                
                                <div class="space-y-3">
                                    @foreach($miOrganizacion->users()->wherePivot('role', 'colaborador')->get() as $user)
                                    <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $user->profile_photo_url }}" 
                                                class="w-8 h-8 rounded-full border-2 border-white shadow-sm">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        @auth
                                            @if (auth()->user()->rol == 2) {{-- Solo Administradores --}}
                                                <button 
                                                    wire:click="removeCollaborator({{ $user->id }})"
                                                    class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="text-sm">Eliminar</span>
                                                </button>
                                            @endif
                                        @endauth
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Botones -->
                        <div class="flex flex-col sm:flex-row justify-between items-center mt-8 space-y-3 sm:space-y-0 sm:space-x-4">
                            <!-- Crear o Actualizar -->
                            <button 
                                class="p-3 rounded-lg w-full sm:w-auto font-nexabold transition-all duration-300 ease-in-out 
                                {{ $miOrganizacion ? 'bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300' : 'bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300' }} text-white shadow-lg flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>                                  
                                {{ isset($miOrganizacion->id) ? 'Actualizar' : 'Crear' }}
                            </button>

                            <!-- Botón Eliminar (solo visible en modo edición) -->
                            @auth
                                @if (auth()->user()->rol == 2) {{-- Solo Administradores --}}
                                    @if ($miOrganizacion)
                                        <button 
                                            class="p-3 rounded-lg w-full sm:w-auto font-nexabold bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 text-white shadow-lg transition-all duration-300 ease-in-out flex items-center justify-center gap-2"
                                            wire:click="deleteOrganization({{ $miOrganizacion->id }})"
                                            onclick="confirm('¿Seguro de eliminar esta Organización?') || event.stopImmediatePropagation()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>             
                                            Eliminar                                    
                                        </button>
                                    @endif
                                @endif
                            @endauth

                            <!-- Salir -->
                            <button 
                                class="p-3 rounded-lg w-full sm:w-auto font-nexabold bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 shadow-lg transition-all duration-300 ease-in-out flex items-center justify-center gap-2"
                                wire:click.prevent="closeCreateModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>                                                 
                                {{ __('Salir') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Modal para Invitar --}}
@if ($showInviteModal)
<div class="fixed inset-0 z-50 bg-black/30 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[85vh] flex flex-col">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-2xl font-bold text-gray-900">Invitar Colaboradores</h3>
            <button wire:click="closeInviteModal" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Contenido -->
        <div class="p-6 flex-1 overflow-y-auto">
            <!-- Buscador -->
            <div class="relative mb-6">
                <input 
                    type="text" 
                    wire:model.live="search"
                    wire:keydown.enter="searchUsers"
                    placeholder="Escribe para buscar..."
                    class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all"
                >
                <button 
                    wire:click="searchUsers"
                    class="absolute right-3 top-3 text-gray-400 hover:text-indigo-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>

            <!-- Lista de Usuarios -->
            <div class="space-y-4">
                @forelse($users as $user)
                <div class="group flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200 hover:border-indigo-200 hover:bg-indigo-50 transition-colors">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $user->profile_photo_url }}" 
                             class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm">
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $user->name }}</h4>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        </div>
                    </div>
                    <button 
                        wire:click="inviteUser({{ $user->id }})"
                        class="flex items-center space-x-2 px-4 py-2 bg-white border border-indigo-500 text-indigo-600 rounded-full hover:bg-indigo-500 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span class="text-sm font-medium">Invitar</span>
                    </button>
                </div>
                @empty
                <div class="p-8 text-center text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                    </svg>
                    No se encontraron usuarios
                </div>
                @endforelse
            </div>
        </div>

        <!-- Footer -->
        <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
            <div class="flex justify-end">
                <button 
                    wire:click="closeInviteModal"
                    class="px-6 py-2 text-gray-600 hover:text-gray-800 font-medium rounded-lg">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endif