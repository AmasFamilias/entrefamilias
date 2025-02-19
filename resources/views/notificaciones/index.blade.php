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

                    <!-- Mensaje de éxito -->
                    @if(session('success'))
                        <div x-data="{ show: true }" 
                             x-show="show" 
                             x-init="setTimeout(() => show = false, 5000)" 
                             class="mt-2 text-indigo-500">
                            <div class="flex items-center">
                                <!-- Ícono SVG de éxito -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 10-1.414-1.414L9 9.586 7.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <h4 class="font-bold text-indigo-500">¡Éxito!</h4>
                            </div>
                            <x-input-error :messages="session('success')" class="text-indigo-500 bg-indigo-100 border-indigo-500" />
                        </div>
                    @endif

                    <!-- Sección de Notificaciones -->
                    <div class="space-y-6">

                        <!-- Notificaciones No Leídas -->
                        <h2 class="text-lg font-bold text-yellow-600">📩 No Leídas</h2>
                        <div class="divide-y divide-gray-300">
                            @forelse ($notificacionesNoLeidas as $notificacion)
                                <div class="p-4 bg-yellow-100 rounded-lg shadow-sm flex flex-col sm:flex-row items-center sm:items-start">
                                    
                                    <!-- Imagen de la vacante (Centrada en móviles) -->
                                    <div class="sm:mr-4 mb-4 sm:mb-0">
                                        <img src="{{ asset('storage/vacantes/' . ($notificacion->data['imagen_vacante'] ?? 'default.jpg')) }}" 
                                             alt="Imagen de {{ $notificacion->data['nombre_vacante'] }}" 
                                             class="h-14 w-14 rounded-lg object-cover shadow">
                                    </div>

                                    <!-- Contenido (Centrado en móviles) -->
                                    <div class="flex-1 text-center sm:text-left">
                                        <p class="text-lg font-semibold text-gray-800">
                                            Nuevo contacto en <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                        </p>
                                        <p class="text-sm text-gray-600">Hace: {{ $notificacion->created_at->diffForHumans() }}</p>
                                    </div>
                                    
                                    <!-- Acciones (Alineadas en columna en móviles) -->
                                    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4 sm:mt-0">
                                        
                                        <!-- Botón Ver Contactos -->
                                        <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" 
                                           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm">
                                            Ver Contactos
                                        </a>

                                        <!-- Botón Marcar como Leída -->
                                        <form action="{{ route('notificaciones.leer', $notificacion->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-blue-600 hover:text-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
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
                                    
                                    <!-- Imagen de la vacante -->
                                    <div class="sm:mr-4 mb-4 sm:mb-0">
                                        <img src="{{ asset('storage/vacantes/' . ($notificacion->data['imagen_vacante'] ?? 'default.jpg')) }}" 
                                             alt="Imagen de {{ $notificacion->data['nombre_vacante'] }}" 
                                             class="h-14 w-14 rounded-lg object-cover shadow">
                                    </div>

                                    <!-- Contenido -->
                                    <div class="flex-1 text-center sm:text-left">
                                        <p class="text-lg font-semibold text-gray-700">
                                            Contacto visto en <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                        </p>
                                        <p class="text-sm text-gray-500">Hace: {{ $notificacion->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-600">No tienes notificaciones leídas.</p>
                            @endforelse
                        </div>

                        <!-- Paginación -->
                        <div class="mt-4">
                            {{ $notificacionesLeidas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
