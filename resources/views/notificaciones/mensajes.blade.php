<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Notificaciones de Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-8 text-gray-900">
                    
                    <!-- Encabezado con imagen -->
                    <header class="text-center mb-10">
                        <div class="flex justify-center items-center mb-4">
                            <img src="{{ asset('images/mensajes.png') }}" alt="Icono Mensajes" class="h-20 w-20">
                        </div>
                        <h1 class="text-xl font-bold text-gray-700 tracking-wide">
                            {{ __('MIS NOTIFICACIONES DE MENSAJES') }}
                        </h1>
                    </header>

                    <div class="space-y-6">
                        @forelse ($notificaciones as $notificacion)
                            <div class="bg-gray-100 shadow-md rounded-xl p-6 transition transform hover:scale-[1.02] flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                                
                                <!-- Información del mensaje -->
                                <div class="flex-1">
                                    <p class="text-gray-700 text-lg">
                                        <span class="font-semibold">{{ $notificacion->data['sender_name'] }}</span> 
                                        te ha enviado un mensaje en el Anuncio:
                                    </p>
                                    
                                    <p class="text-xl font-bold text-gray-800 mt-2">
                                        {{ $notificacion->data['nombre_vacante'] }}
                                    </p>

                                    <p class="text-gray-500 text-sm mt-2">
                                        Hace: <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <!-- Botón de acción -->
                                <div class="mt-4 lg:mt-0">
                                    <a href="{{ route('mensajes.index', [$notificacion->data['id_vacante'], $notificacion->data['sender_id']]) }}" 
                                       class="bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold uppercase py-3 px-6 rounded-lg shadow-md transition">
                                        <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2" 
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 10v6a2 2 0 01-2 2h-5.586a2 2 0 00-1.414.586l-2.414 2.414A2 2 0 018 20.414L5.586 18H4a2 2 0 01-2-2v-6a2 2 0 012-2h16a2 2 0 012 2z"></path>
                                        </svg>
                                        Ver Mensajes
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 text-lg font-semibold">No hay Notificaciones de Mensajes Nuevos</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
