<section class="w-full space-y-8 px-4 sm:px-6 lg:px-8">
    <!-- Encabezado con imagen al lado derecho -->
    <header class="flex flex-col md:flex-row items-center md:space-x-6 p-6 bg-white rounded-lg shadow-md">
        <div class="flex-shrink-0">
            <img src="{{ asset('images/principios.png') }}" alt="Logo Principios" class="h-16 w-16">
        </div>
        <div class="border-l-4 border-gray-300 pl-6 flex-1">
            <h2 class="text-2xl font-bold underline mb-2 text-gray-800">
                {{ __('PRINCIPIOS') }}
            </h2>
            <p class="font-nexalight text-md text-gray-600">
                {{ __("Son reglas fundamentales que guían el comportamiento ético y moral de las personas.") }}
            </p>
            <p class="font-nexalight text-lg text-gray-700 mt-2">
                Selecciona hasta 
                <span class="text-yellow-500 font-bold">5 principios</span> 
                que mejor te representen. ¡Desmárcalos y actualiza para reflejar tus principios!
            </p>        
        </div>
        <div class="hidden md:block">
            <img src="{{ asset('images/fondoprincipios.png') }}" alt="Imagen Principios" 
                 class="w-40 h-auto object-cover rounded-lg shadow-lg">
        </div>
    </header>

    <!-- Imagen en modo responsivo (solo en pantallas pequeñas) -->
    <div class="md:hidden flex justify-center">
        <img src="{{ asset('images/fondoprincipios.png') }}" alt="Imagen Principios" 
             class="w-full max-w-xs h-auto object-cover rounded-lg shadow-lg">
    </div>

    <!-- Mensaje de error -->
    <!-- Mensaje de error con diseño mejorado -->
    @if ($errorSeleccion)
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000)" 
            class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
            role="alert">
            
            <div class="flex items-center">
                <svg class="h-6 w-6 text-red-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                <strong class="font-bold">¡Advertencia!</strong>
                <span class="ml-2">Solo puedes seleccionar hasta 5 principios.</span>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="actualizarPrincipios" class="space-y-6">
        <!-- Grid de principios -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($principios as $principio)
                <div class="relative bg-white rounded-lg shadow-lg p-4 text-center cursor-pointer hover:shadow-xl transition-all duration-300 ease-in-out transform hover:-translate-y-1"
                     wire:click="togglePrincipio({{ $principio->id }})"
                     style="min-height: 90px;"> <!-- Aumentamos la altura -->
                    
                    <h3 class="text-sm font-semibold text-gray-800">{{ $principio->descripcion }}</h3>

                    <!-- Etiqueta "Seleccionado" abajo -->
                    <div class="mt-3">
                        @if (in_array($principio->id, $selectedPrincipios))
                            <span class="px-3 py-1 text-xs font-semibold bg-yellow-500 text-white rounded-full inline-block">
                                Seleccionado
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón para actualizar -->
        <div class="flex justify-center mt-8">
            <button type="submit" class="px-8 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-lg">
                {{ __('Actualizar Principios') }}
            </button>
        </div>
    </form>

    <!-- Modal de éxito -->
    @if ($showSuccessModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center space-y-4">
                <h3 class="text-2xl font-bold text-green-600">¡Éxito!</h3>
                <p class="text-gray-600">Los principios han sido actualizados correctamente.</p>
                <button wire:click="cerrarModal" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    {{ __('Entendido') }}
                </button>
            </div>
        </div>
    @endif    
</section>  
