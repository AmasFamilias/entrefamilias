<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Mensaje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">De: {{ $sender->name }}</h3>
                    <p class="text-sm text-gray-600">En el Anuncio: {{ $vacante->titulo }}</p>
                    <p class="text-sm text-gray-600">Para: {{ $receiver->name }}</p>
                    <p class="mt-4">{{ $mensaje->message }}</p>

                    @if($mensaje->archivo)
                        <div class="mt-4">
                            <a href="{{ asset('storage/mensajes/' . $mensaje->archivo) }}" class="text-indigo-500">Descargar archivo adjunto</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
