<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Notificaciones de Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">

                    <!-- Encabezado con imagen -->
                    <header class="text-center mb-8">
                        <div class="flex justify-center items-center mb-3">
                            <img src="{{ asset('images/mensajes.png') }}" alt="Icono Mensajes" class="h-16 w-16">
                        </div>
                        <h1 class="text-lg font-bold text-gray-700 tracking-wide">
                            {{ __('MIS NOTIFICACIONES DE MENSAJES') }}
                        </h1>
                    </header>

                    <!-- Sección de Notificaciones No Leídas -->
                    <h3 class="text-md font-semibold text-gray-800 mb-3">📬 Nuevas Notificaciones</h3>
                    <div class="space-y-4">
                        @forelse ($notificacionesNoLeidas as $notificacion)
                            <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded-md shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                                
                                <!-- Información del mensaje -->
                                <div class="flex-1">
                                    <p class="text-gray-700 text-sm">
                                        <span class="font-semibold">{{ $notificacion->data['sender_name'] }}</span> 
                                        te ha enviado un mensaje en:
                                    </p>
                                    
                                    <p class="text-md font-bold text-gray-800">
                                        {{ $notificacion->data['nombre_vacante'] }}
                                    </p>

                                    <p class="text-gray-500 text-xs mt-1">
                                        Hace: <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <!-- Botón de acción -->
                                <div>
                                    <a href="{{ route('notificaciones.leer-mensaje', $notificacion->id) }}" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold uppercase py-2 px-4 rounded-md shadow-sm transition">
                                         📩 Ver Mensajes
                                     </a>                                     
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 text-sm font-semibold">No tienes nuevas notificaciones</p>
                        @endforelse
                    </div>

                    <!-- Sección de Notificaciones Leídas -->
                    <h3 class="text-md font-semibold text-gray-800 mt-8 mb-3">📂 Historial de Mensajes</h3>
                    <div class="space-y-4">
                        @forelse ($notificacionesLeidas as $notificacion)
                            <div class="bg-gray-100 border-l-4 border-gray-400 p-4 rounded-md shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                                <div class="flex-1">
                                    <p class="text-gray-700 text-sm">
                                        <span class="font-semibold">{{ $notificacion->data['sender_name'] }}</span> 
                                        te envió un mensaje en:
                                    </p>
                                    <p class="text-md font-bold text-gray-800">
                                        {{ $notificacion->data['nombre_vacante'] }}
                                    </p>
                                    <p class="text-gray-500 text-xs mt-1">
                                        Hace: <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <div>
                                    <a href="{{ route('mensajes.index', [$notificacion->data['id_vacante'], $notificacion->data['sender_id']]) }}" 
                                       class="bg-gray-600 hover:bg-gray-700 text-white text-xs font-semibold uppercase py-2 px-4 rounded-md shadow-sm transition">
                                        🔍 Ver Mensajes
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 text-sm font-semibold">No hay mensajes previos</p>
                        @endforelse
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $notificacionesLeidas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
