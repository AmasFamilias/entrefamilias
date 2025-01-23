<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Oportunidad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <!-- Encabezado del Formulario -->
                    <div class="text-center flex items-center justify-center">
                        <div class="mr-4">
                            <img src="{{ asset('images/oportunidad.png') }}" alt="Icono" class="w-16 h-16"> <!-- Reemplaza con la ruta de tu icono -->
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800"> Editar Vacante: {{ $vacante->titulo }}</h2>
                    </div>

                   <div class="md:flex md:justify-center p-5">
                        <livewire:editar-vacante
                            :vacante="$vacante"
                        />
                   </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
