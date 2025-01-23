<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactos interesadas en este Anuncio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <h1 class="text-2xl font-bold text-center my-10">
                        Interesados en este Anuncio: {{ $vacante->titulo }}
                   </h1>

                   <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name}}</p>
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email}}</p>
                                        <p class="text-sm text-gray-600">
                                            Fecha de Contacto: <span class="font-normal">{{ $candidato->created_at->diffForHumans() }}
                                                </span>    
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ route('mensajes.index', ['vacante' => $vacante->id, 'user_id' => $candidato->user->id]) }}"
                                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                            Contactar
                                        </a>                             
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>    
                            @endforelse
                        </ul>
                   </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
