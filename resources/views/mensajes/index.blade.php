<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bandeja de Mensajes') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="flex justify-center">
            <div class="w-full lg:w-8/12 bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-2xl font-bold">Mensajes</h2>
                </div>

                <!-- Incluir el componente Livewire con los parámetros de la URL -->
                <livewire:messenger :vacante_id="$vacante_id" :user_id="$user_id" />
            </div>
        </div>
    </div>
</x-app-layout>
