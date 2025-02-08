<header class="text-center mb-10">
    <div class="flex justify-center items-center mb-4 relative group">
        <!-- Imagen de perfil -->
        <img id="profileImagePreview" 
             src="{{ $user->profile_image ? asset('storage/profiles/' . $user->profile_image) : asset('images/datospersonales.png') }}" 
             alt="Imagen de Perfil" 
             class="h-32 w-32 rounded-full object-cover border-4 border-gray-300">

        <!-- Botón de edición (visible al pasar el mouse) -->
        <button type="button" onclick="document.getElementById('profileImageInput').click()"
                class="absolute inset-0 bg-gray-900 bg-opacity-50 text-white text-sm opacity-0 group-hover:opacity-100 flex items-center justify-center rounded-full">
            Cambiar
        </button>
    </div>

    <!-- Botón para eliminar imagen -->
    <form action="{{ route('profile.deleteImage') }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="font-nexabold text-red-600 hover:underline">
            Eliminar Imagen de Perfil
        </button>
    </form>

    <h2 class="text-2xl font-bold mt-5">
        {{ __('Datos Personales') }}
    </h2>
    <p class="text-md font-semibold">
        {{ __('Actualice la Información de su Perfil') }}
    </p>

    <!-- Formulario para actualizar la imagen -->
    <form id="updateProfileImageForm" action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data" class="hidden">
        @csrf
        <input type="file" name="profile_image" id="profileImageInput" accept="image/*" class="hidden" onchange="updateImagePreview(event)">
        <button type="submit" id="submitProfileImage" class="hidden">Guardar</button>
    </form>
</header>

<script>
    function updateImagePreview(event) {
        const reader = new FileReader();
        const file = event.target.files[0];
        
        reader.onload = function(e) {
            document.getElementById('profileImagePreview').src = e.target.result;
        };
        
        if (file) {
            reader.readAsDataURL(file);
            document.getElementById('updateProfileImageForm').submit();
        }
    }
</script>

<!-- Formulario de Actualización -->
<form method="post" action="{{ route('profile.update') }}" class="md:w-full space-y-5" novalidate>
    @csrf
    @method('patch')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Nombre Completo -->
        <div>
            <x-input-label for="name">
                <span class="text-gray-700 flex items-center">
                    Nombre y Apellido 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 ml-1 text-red-600" viewBox="0 0 24 24" role="img" aria-label="Campo obligatorio">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-1-7h2v2h-2zm0-8h2v6h-2z"/>
                    </svg>
                </span>
            </x-input-label>

            <x-text-input id="name" name="name" type="text" 
                            class="mt-1 block w-full" :value="old('name', $user->name)" 
                            required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Nombre de usuario -->
        <div>
            <x-input-label for="nameuser" :value="__('Nombre de usuario')" />
            <x-text-input id="nameuser" name="nameuser" type="text" 
                            class="mt-1 block w-full" :value="old('nameuser', $user->nameuser)" 
                            required autofocus autocomplete="nameuser" />
            <x-input-error class="mt-2" :messages="$errors->get('nameuser')" />
        </div>

         <!-- Sobre mi -->
         <div>
            <x-input-label for="sobremi" :value="__('sobre mí')" />

            <textarea id="sobremi" name="sobremi" 
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                required autofocus>{{ old('sobremi', $user->sobremi) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('sobremi')" />
        </div>

        <!-- Móvil -->
        <div>
            <x-input-label for="movil" :value="__('Móvil')" />
            <x-text-input id="movil" name="movil" type="tel" 
                            class="mt-1 block w-full" :value="old('movil', $user->movil)" 
                            required autofocus autocomplete="movil" />
            <x-input-error class="mt-2" :messages="$errors->get('movil')" />
        </div>

        <!-- Dirección -->
        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <textarea id="direccion" name="direccion" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required autofocus>{{ old('direccion', $user->direccion) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email">
                <span class="text-gray-700 flex items-center">
                    Email
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 ml-1 text-red-600" viewBox="0 0 24 24" role="img" aria-label="Campo obligatorio">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-1-7h2v2h-2zm0-8h2v6h-2z"/>
                    </svg>
                </span>
            </x-input-label>

            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Tu dirección de correo electrónico no está verificada') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        
    </div>

    <!-- Botón de Actualizar Información -->
    <div class="flex justify-center mt-4">
        <x-primary-button class="px-8 py-2" id="update-info">{{ __('Actualizar Información') }}</x-primary-button>
    </div>
</form>

    <!-- Área de Insignias -->
    <div class="mt-8">
        <!-- Etiqueta centrada y mejorada -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-indigo-600">Mis Insignias</h2>
        </div>
    
        @php
            // Arreglo con nombres y descripciones para cada insignia.
            $insignias = [
                ['nombre' => 'activo', 'descripcion' => 'Activo'],
                ['nombre' => 'anunciador', 'descripcion' => 'Gran comunicador'],
                ['nombre' => 'conversador', 'descripcion' => 'Hábil conversador'],
                ['nombre' => 'pro', 'descripcion' => 'Profesional destacado'],
                ['nombre' => 'bronce', 'descripcion' => 'Nivel bronce'],
                ['nombre' => 'plata', 'descripcion' => 'Nivel plata'],
                ['nombre' => 'oro', 'descripcion' => 'Nivel oro']
            ];
        @endphp
    
        <!-- Contenedor de insignias con separación -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 border rounded-lg shadow-sm">
            @foreach ($insignias as $insignia)
                <div class="cursor-pointer transition-transform duration-300 hover:scale-110 max-w-48 mx-auto" 
                    onclick="openModal('{{ asset('images/' . $insignia['nombre'] . '.png') }}')">
                    <img src="{{ asset('images/' . $insignia['nombre'] . '.png') }}" 
                        alt="{{ $insignia['nombre'] }}" 
                        class="w-full h-60 object-cover rounded-lg">
                    <div class="mt-2 text-center text-sm font-medium text-gray-800">
                        {{ $insignia['descripcion'] }}
                    </div>
                </div>
            @endforeach
        </div>

    
        <!-- Modal para imagen ampliada (implementado en vanilla JS) -->
        <div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-75 z-50">
            <div class="relative bg-white p-4 rounded-lg">
                <button type="button" onclick="closeModal()" class="absolute top-0 right-0 m-2 text-3xl text-gray-600">&times;</button>
                <img id="modalImage" src="" alt="Insignia Ampliada" class="max-h-screen max-w-full rounded-lg">
            </div>
        </div>
    </div>
    
   

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Si existe el mensaje 'status' en la sesión
            @if(session('status') === 'profile-updated')
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Los datos personales han sido actualizados correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Entendido'
                });
            @endif
        });
    </script> 

    <script>
        function updateImagePreview(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileImagePreview').src = e.target.result;
                    // Enviar el formulario automáticamente
                    document.getElementById('updateProfileImageForm').submit();
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        // Función para abrir el modal con la imagen seleccionada
        function openModal(imageUrl) {
            var modal = document.getElementById('modal');
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Función para cerrar el modal
        function closeModal() {
            var modal = document.getElementById('modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Cerrar el modal al hacer clic fuera de la caja central
        window.addEventListener('click', function(e) {
            var modal = document.getElementById('modal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
@endpush
