<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Imagen para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:hidden"
             style="background-image: url('{{ asset('images/funcionamiento_respon.png') }}'); height: 80vh; background-size: cover;">
            <!-- Bloques de texto visibles en pantallas pequeñas -->
            <div class="px-4 sm:px-6 text-center h-full flex flex-col justify-center">
                <div class="font-nexabold space-y-0 mb-4">
                    <p class="text-2xl sm:text-4xl leading-tight tracking-tight text-white">
                        <span class="text-amber-500 font-extrabold">¿</span>
                        <span class="text-2xl sm:text-4xl text-white">CÓMO</span>
                    </p>
                    <p class="text-2xl sm:text-4xl leading-tight tracking-tight text-white">
                        FUNCIONA
                    </p>
                    <p class="text-2xl sm:text-4xl ml-8 leading-tight tracking-tight text-white">
                        NUESTRA
                    </p>
                    <p class="text-2xl sm:text-4xl leading-tight tracking-tight text-white">
                        PLATAFORMA
                        <span class="text-red-600 font-extrabold">?</span>
                    </p>
                </div>
    
                <!-- Segundo bloque de texto -->
                <div class="text-white font-nexabold">
                    <p class="text-lg sm:text-xl leading-tight tracking-tight ml-8 sm:ml-8 mb-4">
                        <span class="bg-amber-500 px-2 py-1 font-extrabold rounded-lg">4 PASOS</span>
                        <span>TE SEPARAN</span>
                    </p>
                    <p class="text-lg sm:text-xl leading-tight tracking-tight ml-20 sm:ml-20 mt-4">
                        <span class="align-top text-base sm:text-lg">DEL</span>
                        <span class="text-xl sm:text-2xl text-white bg-red-600 px-2 py-1 font-extrabold rounded-lg">
                            CAMBIO:
                        </span>
                    </p>
                </div>
            </div>
        </div>
    
        <!-- Imagen para pantallas grandes -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden hidden lg:block lg:py-24"
             style="background-image: url('{{ asset('images/funcionamiento.png') }}'); height: 80vh; background-size: cover;">
            <!-- Bloques de texto para pantallas grandes -->
            <div class="px-4 sm:px-6 lg:px-8 lg:max-w-full text-left h-full flex flex-col justify-center">
                <div class="font-nexabold space-y-0 mb-4">
                    <p class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl leading-tight tracking-tight text-white text-center lg:text-left">
                        <span class="text-amber-500 font-extrabold">¿</span>
                        <span class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl text-white">CÓMO</span>
                    </p>
                    <p class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl leading-tight tracking-tight text-white text-center lg:text-left">
                        FUNCIONA
                    </p>
                    <p class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl ml-8 sm:ml-8 lg:ml-16 leading-tight tracking-tight text-white text-center lg:text-left">
                        NUESTRA
                    </p>
                    <p class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl leading-tight tracking-tight text-white text-center lg:text-left">
                        PLATAFORMA
                        <span class="text-red-600 font-extrabold">?</span>
                    </p>
                </div>
        
                <!-- Segundo bloque de texto -->
                <div class="text-white font-nexabold">
                    <p class="text-lg sm:text-xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center lg:text-left ml-8 sm:ml-8 lg:ml-16 mb-4">
                        <span class="bg-amber-500 px-2 py-1 font-extrabold rounded-lg">4 PASOS</span>
                        <span>TE SEPARAN</span>
                    </p>
                    <p class="text-lg sm:text-xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center lg:text-left ml-20 sm:ml-20 lg:ml-32 mt-4">
                        <span class="align-top text-base sm:text-lg md:text-xl lg:text-2xl">DEL</span>
                        <span class="text-xl sm:text-2xl md:text-3xl lg:text-4xl text-white bg-red-600 px-2 py-1 font-extrabold rounded-lg">
                            CAMBIO:
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="flex flex-col gap-16 lg:flex-col justify-center items-center divide-y divide-gray-200 shadow-md p-6">
        <!-- Paso 1 -->
        <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
            <span class="font-museo300 flex-shrink-0 text-9xl font-bold text-amber-500 text-center">1</span>
            <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                <p class="font-nexabold text-xl leading-relaxed text-center">REGÍSTRATE EN LA PLATAFORMA.</p>
            </div>
            <img src="{{ asset('images/icon_1.png') }}" alt="Icono 1" class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
        </div>        
            
        <!-- Paso 2 -->
        <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
            <img src="{{ asset('images/icon_2.png') }}" alt="Icono 2" class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
            <span class="font-museo300 flex-shrink-0 text-9xl font-bold text-amber-500 text-center">2</span>
            <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                <p class="font-nexabold text-xl leading-relaxed text-justify">¿HAS DETECTADO ALGUNA NECESIDAD O CARENCIA EN TU ENTIDAD? PUBLICA TU ANUNCIO EN LA PLATAFORMA.</p>
                <p class="font-museo300 text-base text-justify">SI TIENES PROBLEMAS PARA PUBLICAR TU PRIMER ANUNCIO, NO DUDES EN CONSULTARNOS. ¡ESTE ES UNO DE NUESTROS TALENTOS!</p>
            </div>
        </div>

        <!-- Paso 3 -->
        <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
            <span class="font-museo300 flex-shrink-0 text-9xl font-bold text-amber-500 text-center">3</span>
            <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                <p class="font-nexabold text-xl leading-relaxed text-justify">
                    CONTACTA CON LAS PERSONAS INTERESADAS EN RESOLVER TU ANUNCIO. INTERCAMBIA IMPRESIONES Y GESTIONA TUS CANDIDATOS.
                </p>
            </div>
            <img src="{{ asset('images/icon_3.png') }}" alt="Icono 2" class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
        </div>

        <!-- Paso 4 -->
        <div class="flex flex-col md:flex-row items-center justify-center py-6 w-full space-y-4 md:space-y-0 md:space-x-6">
            <img src="{{ asset('images/icon_4.png') }}" alt="Icono 2" class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
            <span class="font-museo300 flex-shrink-0 text-9xl font-bold text-amber-500 text-center">4</span>
            <div class="flex-1 text-center md:text-left px-4 max-w-lg">
                <p class="font-nexabold text-base text-justify">
                    CONFIRMA EL "ANUNCIO", ACOMPAÑA A LA PERSONA Y FORMA PARTE DEL CAMBIO. DA ESE PRIMER ANUNCIO, APRECIA SU POTENCIAL 
                    Y AYUDA A QUE MÁS PERSONAS PUEDAN DEMOSTRAR SU VALOR HUMANO. RECUERDA: NO TIENES POR QUÉ PREOCUPARTE POR NADA MÁS. 
                    <a href="https://amasfamilias.com/" target="_blank" class="text-amber-500 font-extrabold underline">A+FAMILIAS</a> SE ENCARGA DEL RESTO (SEGUROS, RETRIBUCIÓN...)  
                </p>
            </div>
        </div>              
    </div>
</x-app-layout>
