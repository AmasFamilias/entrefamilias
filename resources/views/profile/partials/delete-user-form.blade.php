<section class="max-w-md mx-auto">
    <header class="text-center mb-5">
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/darsedebaja.png') }}" alt="Icono Darse de Baja" class="h-16 w-16">
        </div>
        <h2 class="text-2xl font-bold underline">
            {{ __('DARSE DE BAJA') }}
        </h2>
        <p class="text-center text-md font-semibold">
            {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán de 
            forma permanente. Antes de proceder, descargue cualquier dato o información que desee conservar.
            ') }}
        </p>
    </header>

    <div class="flex items-center justify-center gap-4">
            <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Darse de Baja') }}</x-danger-button>
    </div>
    
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. 
                     Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
