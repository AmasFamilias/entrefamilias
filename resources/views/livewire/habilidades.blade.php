<section class="w-full space-y-8 px-4 sm:px-6 lg:px-8"> 
    <header class="text-center mb-10">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/habilidades.png') }}" alt="Icono Habilidades" class="h-16 w-16">
        </div>
        <h2 class="text-3xl font-extrabold text-gray-800">{{ __('Habilidades') }}</h2>
        <p class="text-lg text-gray-600 mt-2">
            Selecciona hasta <span class="text-yellow-500 font-bold">2 habilidades</span> que mejor te representen.
        </p>        
    </header>

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
                <span class="ml-2">Solo puedes seleccionar hasta 2 habilidades.</span>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="actualizarHabilidades" class="space-y-6">
        <!-- Tarjetas de habilidades -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($habilidades as $index => $habilidad)
                <div 
                    class="relative rounded-lg shadow-lg p-4 text-center transition transform duration-300 ease-in-out cursor-pointer"
                    wire:click="toggleHabilidad({{ $habilidad->id }})"
                    style="background-image: url('{{ asset('images/habilidad' . ($index + 1) . '.png') }}'); background-size: cover; height: 250px; width: 200px;">
                    
                    <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg"></div>
                    <div class="relative z-10 text-white text-center flex flex-col justify-between h-full">
                        <h3 class="text-xl font-bold mt-4">{{ $habilidad->habilidad }}</h3>
                        <p class="text-sm">{{ $habilidad->descripcion }}</p>
                        <div class="mb-4">
                            <span class="px-4 py-1 rounded-full text-sm font-semibold
                                {{ in_array($habilidad->id, $selectedHabilidades) ? 'bg-amber-500' : 'bg-indigo-500' }}">
                                {{ in_array($habilidad->id, $selectedHabilidades) ? 'Seleccionado' : 'Seleccionar' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón para actualizar -->
        <div class="flex items-center justify-center mt-8">
            <button type="submit" class="px-8 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-lg">
                {{ __('Actualizar Habilidades') }}
            </button>
        </div>
    </form>

    <!-- Modal de éxito -->
    @if ($showSuccessModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center space-y-4">
                <h3 class="text-2xl font-bold text-green-600">¡Éxito!</h3>
                <p class="text-gray-600">Las habilidades han sido actualizadas correctamente.</p>
                <button wire:click="cerrarModal" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    {{ __('Entendido') }}
                </button>
            </div>
        </div>
    @endif
</section>
