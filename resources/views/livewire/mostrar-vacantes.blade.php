<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante )
            <!-- Contenedor de la Vacante con Separador -->
            <div class="border-b border-gray-300 last:border-none">
                <div class="p-6 bg-white flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
                    <!-- Detalles de la Vacante -->
                    <div class="flex-1 space-y-3">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="font-museo300 text-2xl font-semibold text-gray-800">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-md text-gray-700 font-museo700">
                            Impartido por {{ $vacante->entidad }}
                        </p>
                        <p class="text-sm text-gray-600 font-museo300">
                            Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                        </p>

                        <!-- Botones de Acción -->
                        <div class="flex flex-col md:flex-row items-stretch gap-3">
                            <a href="{{ route('candidatos.index', $vacante) }}" class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-nexabold uppercase text-center">
                                {{ $vacante->candidatos->count() }} Candidatos
                            </a>
                            <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-amber-500 py-2 px-4 rounded-lg text-white text-xs font-nexabold uppercase text-center">
                                Editar
                            </a>
                            <button wire:click="$dispatch('mostrarAlerta', { vacante: {{$vacante->id}} })"
                                class="bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-nexabold uppercase text-center">
                                Eliminar
                            </button>
                        </div>
                    </div>

                    <!-- Imagen de la Vacante -->
                    <div class="w-full md:w-auto md:ml-6">
                        <img 
                            src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                            alt="{{ 'Imagen vacante ' . $vacante->titulo }}" 
                            class="w-full h-48 md:h-64 object-cover rounded-lg"
                        >
                    </div>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">
                No hay Oportunidades que mostrar.
            </p>       
        @endforelse 

        {{-- Agregando paginacion a esta sección, para que se note bajar en el Controlador el numero de Registros --}}
        <div class="mt-2 md:mt-0">
            {{ $vacantes->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', vacante => {
                Swal.fire({
                    title: '¿Desea Eliminar Oportunidad?',
                    text: "¡Esta acción NO podrás revertirla!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, ¡ELIMINAR!',
                    cancelButtonText: 'CANCELAR'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarVacante',[vacante]);
 
                        Swal.fire(
                            '¡ELIMINADA!',
                            'Tu Oportunidad ha sido eliminada.',
                            'success'
                        )
                    }
                });
       });
    });

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Oportunidad?',
                    text: "Una Oprotunidad eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡ELIMINAR!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Oportunidad',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
    </script>
@endpush
