<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Contenedor para pantallas grandes y medianas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden hidden sm:block"
             style="background-image: url('{{ asset('images/home_manos.png') }}'); height: 75vh; background-size: cover;">
            <div class="flex items-center justify-center h-full w-full px-2 sm:px-4 lg:px-6">
                <div class="text-center">
                    <p class="font-museo300 text-2xl sm:text-2xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center text-white">
                        Tu comunidad para 
                        <span class="font-bold">
                            compartir, aprender 
                        </span> 
                    </p>
    
                    <p class="font-museo300 text-2xl sm:text-2xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center text-white">
                        <span class="font-bold">y conectar con familias</span>
                        afines a ti.
                    </p>
                    <div class="font-nexabold flex justify-center items-center py-6 sm:py-8 lg:py-12">
                        <a href="{{ route('register') }}" 
                           class="bg-amber-500 py-4 px-8 rounded-lg text-white uppercase underline text-center text-lg sm:text-xl md:text-2xl">
                            REGÍSTRATE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Contenedor para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden sm:hidden"
             style="background-image: url('{{ asset('images/home_respon.png') }}'); height: 75vh; background-size: cover;">
            <div class="flex items-center justify-center h-full w-full px-2">
                <div class="text-center">
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-center text-white">
                        Tu comunidad para 
                        <span class="font-bold">compartir, aprender</span>
                    </p>
    
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-center text-white">
                        <span class="font-bold">y conectar con familias</span>
                        afines a ti.
                    </p>
                    <div class="flex justify-center items-center py-6">
                        <a href="{{ route('register') }}" 
                           class="bg-amber-500 py-3 px-6 rounded-lg text-white font-bold uppercase underline text-center text-base">
                            REGÍSTRATE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        <livewire:home-vacantes/>       
</x-app-layout>
