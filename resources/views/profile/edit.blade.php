<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Formulario de Información de Perfil -->
            <div id="profile-form" class="p-4 bg-white shadow sm:rounded-lg block">
                @include('profile.partials.update-profile-information-form')

                <div class="flex justify-end mt-4">
                    <x-secondary-button onclick="toggleForms('password')">{{ __('Cambiar Password >>') }}</x-secondary-button>
                </div>
            </div>
            
            <!-- Formulario de Cambio de Contraseña -->
            <div id="password-form" class="p-4 bg-white shadow sm:rounded-lg hidden">
                @include('profile.partials.update-password-form')

                <div class="flex justify-between mt-4">
                    <x-secondary-button onclick="toggleForms('profile')">{{ __('<< Perfil de Usuario') }}</x-secondary-button>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleForms(form) {
            document.getElementById('profile-form').classList.toggle('hidden', form !== 'profile');
            document.getElementById('password-form').classList.toggle('hidden', form !== 'password');
        }
    </script>
</x-app-layout>