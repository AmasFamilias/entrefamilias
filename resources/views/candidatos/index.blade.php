<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight text-center sm:text-left">
            {{ __('Contactos interesados en este Anuncio') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl sm:text-3xl font-bold text-center my-4 sm:my-6 text-gray-800">
                        Interesados en: <span class="text-blue-600">{{ $vacante->titulo }}</span>
                    </h1> 

                    <div class="flex flex-col items-center sm:items-start p-4 sm:p-6">
                        <ul class="divide-y divide-gray-200 w-full max-w-4xl">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-5 sm:p-6 flex flex-col sm:flex-row items-center bg-gray-100 rounded-xl shadow-md hover:shadow-lg transition mb-4 sm:gap-6 w-full">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $candidato->user->profile_image ? route('file.profile', ['userId' => $candidato->user->id, 'filename' => basename($candidato->user->profile_image)]) : asset('images/datospersonales.png') }}"
                                            alt="Foto de {{ $candidato->user->name }}"
                                            class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-4 border-blue-500 shadow-md">
                                    </div>

                                    <div class="flex-1 text-center sm:text-left mt-4 sm:mt-0">
                                        <p class="text-lg sm:text-xl font-semibold text-gray-800">{{ $candidato->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                        <p class="text-sm text-gray-500 mt-2">
                                            Fecha de Contacto: <span class="font-medium">{{ $candidato->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>

                                    <div class="mt-4 sm:mt-0">
                                        <a href="{{ route('mensajes.index', ['vacante' => $vacante->id, 'user_id' => $candidato->user->id]) }}"
                                            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white py-2 px-5 rounded-lg text-sm font-semibold uppercase flex items-center gap-2 shadow-md transform transition hover:scale-105">
                                             
                                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                  stroke="currentColor" class="w-6 h-6">
                                                 <path stroke-linecap="round" stroke-linejoin="round" 
                                                       d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                             </svg>
                                         
                                             Contactar
                                         </a>                                                     
                                    </div>
                                </li>
                            @empty
                                <p class="p-6 text-center text-gray-600 text-lg font-semibold">No hay candidatos aún</p>    
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>