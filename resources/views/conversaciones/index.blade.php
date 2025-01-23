<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Conversaciones') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <header class="text-center mb-10"> 
                        <div class="flex justify-center items-center mb-4">
                            <img src="{{ asset('images/conversaciones.png') }}" alt="Icono Conversaciones" class="h-16 w-16">
                        </div>
                        <h1 class="underline">
                            {{ __('CONVERSACIONES POR ANUNCIO') }}
                        </h1>
                    </header>

                    <div class="space-y-8">
                        @forelse ($vacantes as $vacante)
                            <div class="p-4 bg-gray-100 rounded-lg">
                                <div class="flex flex-col lg:flex-row-reverse items-start lg:items-center gap-4">
                                    <!-- Imagen del anuncio al lado derecho con tamaño reducido -->
                                    <img 
                                        src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                                        alt="{{ 'Imagen vacante ' . $vacante->titulo }}" 
                                        class="w-48 h-32 object-cover rounded-lg"
                                    >

                                    <!-- Información de la vacante -->
                                    <div class="flex-1">
                                        <h2 class="text-lg font-semibold">{{ $vacante->titulo }}</h2>
                                        <ul class="font-museo300 mt-4 space-y-2">
                                            @foreach ($vacante->mensajes->groupBy('receiver_id') as $receiverId => $mensajes)
                                                @if ($receiverId !== auth()->user()->id) <!-- Excluir al usuario autenticado -->
                                                    <li>
                                                        <a href="{{ route('mensajes.index', [$vacante->id, $receiverId]) }}"
                                                           class="text-blue-600 hover:underline">
                                                            Conversación con {{ $mensajes->first()->receiver->name }} ({{ $mensajes->count() }} mensajes)
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Línea divisoria -->
                            <hr class="border-gray-300">
                        @empty
                            <p class="text-gray-600 text-center font-nexabold">No tienes conversaciones aún.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
