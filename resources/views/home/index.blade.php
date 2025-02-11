<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Contenedor para pantallas grandes y medianas -->
        <div class="relative w-full overflow-hidden hidden sm:block" 
             style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), 
                    url('{{ asset('images/home_manos.png') }}') center/cover no-repeat; height: 58vh;">
            <div class="flex items-center justify-center h-full w-full px-4 lg:px-8">
                <div class="text-center">
                    <p class="font-museo300 text-2xl md:text-3xl lg:text-4xl leading-tight tracking-tight text-white drop-shadow-lg">
                        Tu comunidad para 
                        <span class="font-bold">compartir, aprender</span>
                    </p>
                    <p class="font-museo300 text-2xl md:text-3xl lg:text-4xl leading-tight tracking-tight text-white drop-shadow-lg">
                        <span class="font-bold">y conectar con familias</span> afines a ti.
                    </p>

                    <div class="font-nexabold flex justify-center items-center py-6 sm:py-8">
                        @if (auth()->check())
                            <a href="{{ route('vacantes.create') }}" 
                               class="bg-indigo-500 hover:bg-indigo-600 transition-transform duration-300 px-6 py-3 
                               rounded-lg text-white uppercase text-lg sm:text-xl md:text-2xl shadow-md transform hover:scale-105">
                                ¡Comienza tu Anuncio Ahora!
                            </a>
                        @else
                            <a href="{{ route('register') }}" 
                               class="bg-amber-500 hover:bg-amber-600 transition-transform duration-300 px-6 py-3 
                               rounded-lg text-white uppercase text-lg sm:text-xl md:text-2xl shadow-md transform hover:scale-105">
                                REGÍSTRATE
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor para pantallas pequeñas -->
        <div class="relative w-full overflow-hidden sm:hidden" 
             style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), 
                    url('{{ asset('images/home_respon.png') }}') center/cover no-repeat; height: 52vh;">
            <div class="flex items-center justify-center h-full w-full px-3">
                <div class="text-center">
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-white drop-shadow-lg">
                        Tu comunidad para 
                        <span class="font-bold">compartir, aprender</span>
                    </p>
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-white drop-shadow-lg">
                        <span class="font-bold">y conectar con familias</span> afines a ti.
                    </p>

                    <div class="flex justify-center items-center py-4">
                        @if (auth()->check())
                            <a href="{{ route('vacantes.create') }}" 
                               class="bg-indigo-500 hover:bg-indigo-600 transition-transform duration-300 px-4 py-2 
                               rounded-lg text-white font-bold uppercase text-sm shadow-md transform hover:scale-105">
                                ¡Comienza tu Anuncio Ahora!
                            </a>
                        @else
                            <a href="{{ route('register') }}" 
                               class="bg-amber-500 hover:bg-amber-600 transition-transform duration-300 px-4 py-2 
                               rounded-lg text-white font-bold uppercase text-sm shadow-md transform hover:scale-105">
                                REGÍSTRATE
                            </a>
                        @endif
                    </div>                    
                </div>
            </div>
        </div>
    </div>    

    <livewire:home-vacantes/>       
</x-app-layout>
