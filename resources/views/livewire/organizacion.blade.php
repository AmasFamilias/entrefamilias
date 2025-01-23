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

    {{-- Botón de Agregar un Registro Nuevo --}}
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
    

    <!-- Lista de Organizaciones -->
    <div class="font-museo300 bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($organizations as $organization)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl animate-fadeIn">
                        <!-- Imagen -->
                        <div class="relative group">
                            <img src="{{ $organization->imagen ? asset('storage/' . $organization->imagen) : asset('images/perfil_ong.png') }}" 
                                alt="Imagen de la Organización" 
                                class="h-40 w-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
                                <span class="text-white font-bold text-sm">{{ __('Ver más') }}</span>
                            </div>
                        </div>
                        
                        <!-- Contenido -->
                        <div class="p-4">
                            <h3 class="font-nexabold text-lg text-gray-800 truncate">{{ $organization->nombre }}</h3>
                            <p class="font-nexalight text-sm text-gray-600 mt-2">{{ Str::limit($organization->descripcion, 80) }}</p>
                            
                            <!-- Botones -->
                            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                                <!-- Botón Editar -->
                                <button 
                                    wire:click="openCreateModal({{ $organization->id }})" id="edit-btn-{{ $organization->id}}"
                                    class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600 transition duration-300 flex items-center justify-center w-full sm:w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    {{ __('Editar') }}
                                </button>
                                
                                <!-- Botón Invitar -->
                                <button 
                                    wire:click="loadOrganizationData({{ $organization->id }})" 
                                    class="bg-amber-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-amber-600 transition duration-300 flex items-center justify-center w-full sm:w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>
                                    {{ __('Invitar') }}
                                </button>
                            </div>
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

    

<!-- Modal -->
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
                            <div>
                                <x-input-label for="imagen" :value="__('Imagen de la Organización')" />
                                <div class="relative group flex items-center justify-center mb-4">
                                    <!-- Imagen seleccionada (vista previa temporal) -->
                                    @if ($imagen)
                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa" class="h-40 w-40 object-fit: cover rounded-lg border">
                                    <!-- Imagen actual -->
                                    @elseif ($currentImage)
                                        <img src="{{ asset('storage/' . $currentImage) }}" alt="Imagen actual" class="h-40 w-40 object-fit: cover rounded-lg border">
                                    <!-- Imagen predeterminada -->
                                    @else
                                        <img src="{{ asset('images/perfil_ong.png') }}" alt="Imagen predeterminada" class="h-40 w-40 object-fit: cover rounded-lg border">
                                    @endif
                                </div>
                            
                                <!-- Input para subir imagen -->
                                <label for="imagen-upload" class="flex items-center gap-2 cursor-pointer text-indigo-600 hover:text-indigo-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 20l7-7 7 7M5 10l7-7 7 7" />
                                    </svg>
                                    <span>{{ __('Seleccionar imagen') }}</span>
                                </label>
                                <input type="file" id="imagen-upload" wire:model="imagen" class="hidden" />
                                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                            </div>                            
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-between items-center mt-8 space-x-4">
                            <!-- Crear o Actualizar -->
                            <button 
                                class="p-3 rounded-full text-white w-full font-nexabold 
                                {{ $miOrganizacion ? 'bg-indigo-600 hover:bg-indigo-700' : 'bg-amber-500 hover:bg-amber-600' }}" 
                                wire:click="createOrAttachOrganization">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline-block mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>                                  
                                {{ isset($miOrganizacion->id) ? 'Actualizar' : 'Crear' }}
                            </button>
                            
                            <!-- Botón Eliminar (solo visible en modo edición) -->
                            @if ($miOrganizacion)
                                <button 
                                    class="p-3 bg-red-600 hover:bg-red-700 text-white rounded-full w-full font-nexabold" 
                                    wire:click="deleteOrganization({{ $miOrganizacion->id }})"
                                    onclick="confirm('¿Seguro de eliminar esta Organización?') || event.stopImmediatePropagation()" id="delete-btn-{{ $miOrganizacion->id }}"
                                    class="bg-red-500 text-white px-4 py-2 rounded w-full md:w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline-block mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>             
                                    Eliminar                                    
                                </button>
                            @endif

                            <!-- Salir -->
                            <button 
                                class="p-3 bg-white border rounded-full w-full font-nexabold text-gray-600 hover:bg-gray-100" 
                                wire:click.prevent="closeCreateModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline-block mr-2">
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
</div>
