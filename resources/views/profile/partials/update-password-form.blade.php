<section class="max-w-md mx-auto">
    <header class="text-center mb-5">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/cambiar_password.png') }}" alt="Icono Cambiar Password" class="h-16 w-16">
        </div>
        <h2 class="font-nexabold text-2xl underline">
            {{ __('CAMBIAR PASSWORD') }}
        </h2>
        <p class="font-museo300 text-center text-md font-semibold">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="flex flex-col items-center" novalidate>
        @csrf
        @method('put')

        <div>
            <x-text-input id="update_password_current_password" name="current_password" type="password" placeholder="Password Actual"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-text-input id="update_password_password" name="password" type="password" placeholder="Nuevo Password"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" placeholder="Repetir Password"
                class="mt-1 block w-full rounded-full border border-gray-400 px-4 py-2" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Botón de Actualizar Información -->
        <div class="flex justify-center mt-4">
            <x-primary-button class="px-8 py-2" id="update-pass">{{ __('Cambiar Password') }}</x-primary-button>
        </div>
    </form>
</section>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Si existe el mensaje 'status' en la sesión
            @if(session('status') === 'password-updated')
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Password Actualizado Correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Entendido'
                });
            @endif
        });
    </script> 
@endpush

