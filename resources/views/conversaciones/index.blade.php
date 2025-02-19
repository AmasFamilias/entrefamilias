<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Mis Conversaciones') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-8 text-gray-900">
                    
                    <!-- Encabezado con imagen -->
                    <header class="text-center mb-10">
                        <div class="flex justify-center items-center mb-4">
                            <img src="{{ asset('images/conversaciones.png') }}" alt="Icono Conversaciones" class="h-20 w-20">
                        </div>
                        <h1 class="text-xl font-bold text-gray-700 tracking-wide">
                            {{ __('CONVERSACIONES POR ANUNCIO') }}
                        </h1>
                    </header>

                    <div class="space-y-6">
                        @forelse ($vacantes as $vacante)
                            <div class="bg-gray-100 shadow-md rounded-xl p-6 transition transform hover:scale-[1.02]">
                                <div class="flex flex-col lg:flex-row-reverse items-start lg:items-center gap-6">
                                    
                                    <!-- Imagen del anuncio con mejor tamaño -->
                                    <img 
                                        src="{{ $vacante->imagen ? asset('storage/vacantes/' . $vacante->imagen) : asset('images/default-vacante.png') }}" 
                                        alt="{{ 'Imagen vacante ' . $vacante->titulo }}" 
                                        class="w-52 h-36 object-cover rounded-lg shadow-md"
                                    >

                                    <!-- Información de la vacante -->
                                    <div class="flex-1">
                                        <h2 class="text-xl font-semibold text-gray-800">{{ $vacante->titulo }}</h2>
                                        <p class="text-gray-600 text-sm mt-1">Conversaciones activas:</p>

                                        <ul class="mt-3 space-y-3">
                                            @foreach ($vacante->mensajes->groupBy('receiver_id') as $receiverId => $mensajes)
                                                @if ($receiverId !== auth()->user()->id) <!-- Excluir al usuario autenticado -->
                                                    <li>
                                                        <a href="{{ route('mensajes.index', [$vacante->id, $receiverId]) }}"
                                                           class="flex items-center text-blue-600 hover:text-blue-800 transition">
                                                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" 
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 10v6a2 2 0 01-2 2h-5.586a2 2 0 00-1.414.586l-2.414 2.414A2 2 0 018 20.414L5.586 18H4a2 2 0 01-2-2v-6a2 2 0 012-2h16a2 2 0 012 2z"></path>
                                                            </svg>
                                                            Conversación con 
                                                            <span class="font-medium text-gray-800 ml-1">{{ $mensajes->first()->receiver->name }}</span> 
                                                            ({{ $mensajes->count() }} mensajes)
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center text-lg font-semibold">No tienes conversaciones aún.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
