<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">

                    <!-- Encabezado -->
                    <header class="text-center mb-8">
                        <div class="flex justify-center items-center mb-4">
                            <img src="{{ asset('images/notificaciones.png') }}" alt="Icono Notificaciones" class="h-16 w-16">
                        </div>
                        <h1 class="text-2xl font-extrabold text-gray-800">
                            {{ __('MIS NOTIFICACIONES') }}
                        </h1>
                    </header>

                    <div class="space-y-6">
                        <!-- Notificaciones No Leídas -->
                        <h2 class="text-lg font-bold text-yellow-600">📩 No Leídas</h2>
                        <div class="divide-y divide-gray-300">
                            @forelse ($notificacionesNoLeidas as $notificacion)
                                <div class="p-4 bg-yellow-100 rounded-lg shadow-sm flex flex-col sm:flex-row items-center sm:items-start">
                                    
                                    <!-- Imagen -->
                                    <div class="sm:mr-4 mb-4 sm:mb-0">
                                        @if($notificacion->data['tipo'] === 'candidato')
                                            <img src="{{ asset('storage/vacantes/' . ($notificacion->data['imagen_vacante'] ?? 'default-vacante.png')) }}" 
                                                 alt="{{ $notificacion->data['nombre_vacante'] }}" 
                                                 class="h-14 w-14 rounded-lg object-cover shadow">
                                        @else
                                            <svg class="h-14 w-14 rounded-lg shadow text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <circle cx="9" cy="8" r="4" stroke="currentColor" stroke-width="1.5" fill="none"></circle>
                                                <path d="M3 20c0-4 3-7 6-7s6 3 6 7" stroke="currentColor" stroke-width="1.5" fill="none"></path>
                                                <path d="M19 8v4m-2-2h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <circle cx="19" cy="8" r="3" stroke="currentColor" stroke-width="1.5" fill="none"></circle>
                                            </svg>
                                        @endif
                                    </div>
                
                                    <!-- Contenido -->
                                    <div class="flex-1 text-center sm:text-left">
                                        @if($notificacion->data['tipo'] === 'candidato')
                                            <p class="text-lg font-semibold text-gray-800"> 
                                                Nuevo contacto en <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                            </p>
                                        @else
                                            <p class="text-lg font-semibold text-gray-800">
                                                Has sido invitado a colaborar en <span class="font-bold">{{ $notificacion->data['organizacion_nombre'] }}</span>
                                            </p>
                                            <p class="text-sm text-gray-600">Invitado por: {{ $notificacion->data['admin_nombre'] }}</p>
                                        @endif
                                        <p class="text-sm text-gray-600">Hace: {{ $notificacion->created_at->diffForHumans() }}</p>
                                    </div>
                
                                    <!-- Acciones -->
                                    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4 sm:mt-0">
                                        <form method="POST" action="{{ route('notificaciones.leer', $notificacion->id) }}">
                                            @csrf
                                            @if($notificacion->data['tipo'] === 'candidato')
                                                <input type="hidden" name="redirect_to" value="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}">
                                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm">
                                                    Contactar
                                                </button>
                                            @else
                                                <input type="hidden" name="redirect_to" value="{{ route('vacantes.create') }}">
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm">
                                                    Haz tu Anuncio
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-600">No tienes notificaciones nuevas.</p>
                            @endforelse
                        </div>
                
                        <!-- Notificaciones Leídas -->
                        <h2 class="text-lg font-bold text-gray-600">📜 Leídas</h2>
                        <div class="divide-y divide-gray-300">
                            @forelse ($notificacionesLeidas as $notificacion)
                                <div class="p-4 bg-gray-100 rounded-lg shadow-sm flex flex-col sm:flex-row items-center sm:items-start">
                                    
                                    <!-- Imagen -->
                                    <div class="sm:mr-4 mb-4 sm:mb-0">
                                        @if($notificacion->data['tipo'] === 'candidato')
                                            <img src="{{ asset('storage/vacantes/' . ($notificacion->data['imagen_vacante'] ?? 'default-vacante.png')) }}" 
                                                alt="{{ $notificacion->data['nombre_vacante'] }}" 
                                                class="h-14 w-14 rounded-lg object-cover shadow">
                                        @else
                                            <svg class="h-14 w-14 rounded-lg shadow text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <circle cx="9" cy="8" r="4" stroke="currentColor" stroke-width="1.5" fill="none"></circle>
                                                <path d="M3 20c0-4 3-7 6-7s6 3 6 7" stroke="currentColor" stroke-width="1.5" fill="none"></path>
                                                <path d="M19 8v4m-2-2h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <circle cx="19" cy="8" r="3" stroke="currentColor" stroke-width="1.5" fill="none"></circle>
                                            </svg>
                                        @endif
                                    </div>

                                    <!-- Contenido -->
                                    <div class="flex-1 text-center sm:text-left">
                                        @if($notificacion->data['tipo'] === 'candidato')
                                            <p class="text-lg font-semibold text-gray-700">
                                                Contacto visto en <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                            </p>
                                        @else
                                            <p class="text-lg font-semibold text-gray-700">
                                                Invitación vista de <span class="font-bold">{{ $notificacion->data['organizacion_nombre'] }}</span>
                                            </p>
                                        @endif
                                        <p class="text-sm text-gray-500">Hace: {{ $notificacion->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-600">No tienes notificaciones leídas.</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
