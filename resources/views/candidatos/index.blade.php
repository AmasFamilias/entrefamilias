<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight text-center sm:text-left">
            {{ __('Contactos interesados en este Anuncio') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Título del Anuncio -->
                    <h1 class="text-2xl sm:text-3xl font-bold text-center my-4 sm:my-6 text-gray-800">
                        Interesados en: <span class="text-blue-600">{{ $vacante->titulo }}</span>
                    </h1>

                    <div class="flex flex-col items-center sm:items-start p-4 sm:p-6">
                        <ul class="divide-y divide-gray-200 w-full max-w-3xl">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-4 sm:p-5 flex flex-col sm:flex-row items-center bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition mb-4 sm:gap-4 w-full">
                                    <!-- Imagen de Perfil -->
                                    <div class="flex-shrink-0">
                                        <img src="{{ $candidato->user->profile_image ? asset('storage/' . $candidato->user->profile_image) : asset('images/datospersonales.png') }}"
                                            alt="Foto de {{ $candidato->user->name }}"
                                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover border-2 border-blue-500">
                                    </div>

                                    <div class="flex-1 text-center sm:text-left mt-3 sm:mt-0">
                                        <!-- Nombre del Candidato -->
                                        <p class="text-lg sm:text-xl font-semibold text-gray-800">{{ $candidato->user->name }}</p>
                                        <!-- Email -->
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                        <!-- Fecha de Contacto -->
                                        <p class="text-sm text-gray-500">
                                            Fecha de Contacto: <span class="font-medium">{{ $candidato->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>

                                    <!-- Botón de Contactar -->
                                    <div class="mt-4 sm:mt-0">
                                        <a href="{{ route('mensajes.index', ['vacante' => $vacante->id, 'user_id' => $candidato->user->id]) }}"
                                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-xs sm:text-sm font-semibold uppercase flex items-center gap-2 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10"></path>
                                                <polyline points="17 22 12 17 7 22"></polyline>
                                            </svg>
                                            Contactar
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-4 text-center text-sm text-gray-600">No hay candidatos aún</p>    
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
