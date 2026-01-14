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

                    <!-- Barra de búsqueda y filtros -->
                    <div class="mb-8">
                        <form action="{{ route('conversaciones.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <input type="text" 
                                       name="busqueda" 
                                       value="{{ $busqueda }}" 
                                       placeholder="Buscar en conversaciones..." 
                                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                            </div>
                            <div class="flex gap-4">
                                <select name="orden" 
                                        class="rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                                    <option value="reciente" {{ $orden === 'reciente' ? 'selected' : '' }}>Más recientes</option>
                                    <option value="antiguo" {{ $orden === 'antiguo' ? 'selected' : '' }}>Más antiguos</option>
                                    <option value="titulo" {{ $orden === 'titulo' ? 'selected' : '' }}>Por título</option>
                                </select>
                                <button type="submit" 
                                        class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors duration-300">
                                    Filtrar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="space-y-6">
                        @forelse ($vacantes as $vacante)
                            <div class="bg-gray-50 shadow-md rounded-xl p-6 transition transform hover:scale-[1.02] hover:shadow-lg">
                                <div class="flex flex-col lg:flex-row-reverse items-start lg:items-center gap-6">
                                    
                                    <!-- Imagen del anuncio -->
                                    <div class="lg:w-48 w-full flex-shrink-0">
                                        <div class="overflow-hidden rounded-lg shadow-md">
                                            <img 
                                                src="{{ $vacante->imagen ? route('file.vacante', ['vacanteId' => $vacante->id, 'filename' => basename($vacante->imagen)]) : asset('images/default-vacante.png') }}" 
                                                alt="Imagen vacante {{ $vacante->titulo }}" 
                                                class="w-full h-32 lg:h-32 object-cover"
                                            >
                                        </div>
                                    </div>

                                    <!-- Información de la vacante -->
                                    <div class="flex-1">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $vacante->titulo }}</h2>
                                        
                                        <div class="space-y-4">
                                            @foreach ($vacante->conversaciones as $otroUsuarioId => $conversacion)
                                                <a href="{{ route('mensajes.index', [$vacante->id, $otroUsuarioId]) }}"
                                                   class="block bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="relative">
                                                                <img 
                                                                    src="{{ $conversacion['ultimo_mensaje']->sender_id === $usuario->id ? 
                                                                        $conversacion['ultimo_mensaje']->receiver->profile_photo_url : 
                                                                        $conversacion['ultimo_mensaje']->sender->profile_photo_url }}" 
                                                                    alt="Avatar" 
                                                                    class="w-10 h-10 rounded-full"
                                                                >
                                                                @if($conversacion['no_leidos'] > 0)
                                                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                                                        {{ $conversacion['no_leidos'] }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <h3 class="font-medium text-gray-800">
                                                                    {{ $conversacion['ultimo_mensaje']->sender_id === $usuario->id ? 
                                                                        $conversacion['ultimo_mensaje']->receiver->name : 
                                                                        $conversacion['ultimo_mensaje']->sender->name }}
                                                                </h3>
                                                                <p class="text-sm text-gray-500 truncate max-w-md">
                                                                    {{ $conversacion['ultimo_mensaje']->mensaje }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="text-xs text-gray-500">
                                                                {{ $conversacion['ultimo_mensaje']->created_at->diffForHumans() }}
                                                            </span>
                                                            <div class="text-sm text-gray-600 mt-1">
                                                                {{ $conversacion['total_mensajes'] }} mensajes
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-900">No hay conversaciones</h3>
                                <p class="mt-1 text-gray-500">Comienza una conversación sobre algún anuncio.</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
