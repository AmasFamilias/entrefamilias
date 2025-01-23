<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tigh">
            {{ __('Perfil | Seleccionar Avatar') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ step: 1 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 bg-white shadow sm:rounded-lg">
                    <livewire:avatar-generador/>
                </div>
        </div>
    </div>
</x-app-layout> 
