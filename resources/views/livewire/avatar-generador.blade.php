<div class="container mx-auto p-4">
    <!-- Selector de Categoría -->
    <div class="mb-4">
        <label for="select-categoria" class="block mb-2 text-sm font-medium text-gray-700">Selecciona una categoría:</label>
        <select id="select-categoria" class="w-full p-2 border rounded-md">
            <option value="realistas">Realistas</option>
            <option value="pixelados">Pixelados</option>
            <option value="abstractos">Abstractos</option>
        </select>
    </div>

    <!-- Contenedor para los avatares -->
    <div id="contenedor-avatares" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        <!-- Los avatares se cargarán desde JavaScript -->
    </div>

    <!-- Paginación -->
    <div class="flex justify-between mt-4">
        <button id="anterior" class="bg-gray-500 text-white px-3 py-1 rounded" wire:click="paginaAnterior" {{ $paginaActual === 1 ? 'disabled' : '' }}>Anterior</button>
        <span>Página: {{ $paginaActual }}</span>
        <button id="siguiente" class="bg-gray-500 text-white px-3 py-1 rounded" wire:click="paginaSiguiente">Siguiente</button>
    </div>
</div>

<!-- SweetAlert2 Script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Función para SweetAlert al hacer clic en un avatar
        window.seleccionarAvatar = function (avatarUrl) {
            Swal.fire({
                title: '¿Quieres seleccionar este avatar?',
                text: "El avatar será guardado en tu perfil.",
                imageUrl: avatarUrl,
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Avatar seleccionado',
                showCancelButton: true,
                confirmButtonText: 'Seleccionar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Avatar seleccionado',
                        'El avatar ha sido seleccionado con éxito.',
                        'success'
                    );
                    // Aquí puedes emitir un evento o llamar una acción de Livewire para guardar el avatar
                    Livewire.emit('guardarAvatar', avatarUrl);
                }
            });
        };

        // Listeners para cuando se selecciona un avatar en Livewire
        Livewire.on('mostrarSweetAlert', (avatarUrl) => {
            console.log('Livewire ha emitido el evento con la URL del avatar:', avatarUrl); // Añadido para depuración
            seleccionarAvatar(avatarUrl);
        });
    });
</script>



