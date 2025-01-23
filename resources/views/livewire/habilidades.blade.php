<section class="md:w-full space-y-5"> 
    <header class="text-center mb-10">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/habilidades.png') }}" alt="Icono Habilidades" class="h-16 w-16">
        </div>
        <h2 class="text-2xl font-bold underline">
            {{ __('Habilidades') }}
        </h2>
        <p class="font-nexalight text-xl">
            {{ __('Selecciona tus habilidades') }}
        </p>
        <p class="font-nexalight text-lg text-gray-700 mt-2">
            Selecciona hasta 
            <span class="text-yellow-500 font-bold">2 habilidades</span> 
            que mejor te representen. ¡Desmárcalas y actualiza para reflejar tus habilidades!
        </p>        
    </header>

    <form wire:submit.prevent="actualizarHabilidades" class="md:w-full space-y-5">
        @csrf

        <!-- Muestra las habilidades de las tablas -->
        <div class="font-museo300 flex justify-center items-center">
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 justify-center mx-auto">
                @foreach ($habilidades as $index => $habilidad)
                    <div class="relative bg-cover bg-center rounded-lg shadow-md p-4 text-white" style="background-image: url('{{ asset('images/habilidad' . ($index + 1) . '.png') }}'); height: 250px; width: 200px;">
                        <label class="inline-flex items-start">
                            <input type="checkbox" wire:model="selectedHabilidades" value="{{ $habilidad->id }}" 
                                class="form-checkbox h-5 w-5 text-yellow-500 border-yellow-500 bg-transparent rounded"
                                @if (count($selectedHabilidades) >= 2 && !in_array($habilidad->id, $selectedHabilidades)) disabled @endif> 
                            <span class="ml-2 text-xl font-bold">{{ $habilidad->habilidad }}</span>
                        </label>
                        <div class="mt-8 text-center text-sm">{{ $habilidad->descripcion }}</div>
                        <div class="absolute top-0 left-0 w-full h-1 bg-amber-500 rounded-t-lg"></div>
                    </div>
                @endforeach
            </div>
        </div>
        

        <div class="flex items-center justify-center mt-8">
            <x-primary-button class="px-6 py-2 text-lg">{{ __('Actualizar Habilidades') }}</x-primary-button>
        </div>
    </form>
</section>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.addEventListener('livewire:init', () => {
            Livewire.on('habilidadesActualizadas', () => {
                Swal.fire({
                    title: '¡Éxito!',
                    text: "Las habilidades han sido actualizadas correctamente.",
                    icon: 'success',
                    confirmButtonText: 'Entendido'
                });
            });
        });
    </script>
@endpush


