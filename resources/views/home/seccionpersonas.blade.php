<x-app-layout>
    {{-- <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">

            <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24"
                 style="background-image: url('{{ asset('images/seccionpersonas.png') }}'); height: 80vh; background-size: cover;">
                
                <!-- Posicionamiento de logo justo arriba del texto -->
                <div class="font-nexabold absolute top-8 left-8 flex flex-col items-start">
                    <img src="{{ asset('images/logo_mediano.png') }}" alt="Logo" class="w-full sm:w-48 md:w-56 lg:w-full object-contain mb-2">
                    
                    <h2 class="text-left text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                        SECCIÓN
                    </h2>
                    <h2 class="text-left text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                        PERSONAS
                    </h2>
                    <!-- Línea debajo del texto -->
                    <div class="w-full max-w-xs h-1 bg-amber-500 mt-2"></div>
                </div>
                
                <!-- Texto inferior al pie del contenedor -->
                <div class="font-museo300 absolute bottom-4 left-0 right-0 px-4">
                    <p class="text-center text-white text-xl">
                        Creemos que el talento y las habilidades de las personas lo cambian todo.
                        El valor humano es el motor de cambio hacia una sociedad más igualitaria.
                        ¿Quieres formar parte de ese motor? Ayúdanos a que más personas puedan transformar y mejorar su situación.
                    </p>
                </div>
            </div>
    </div> --}}

        <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
            <!-- Imagen para pantallas grandes -->
            <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:py-24 hidden sm:block"
                style="background-image: url('{{ asset('images/seccionpersonas.png') }}'); height: 80vh; background-size: cover;">
                
            <!-- Posicionamiento de logo justo arriba del texto -->
            <div class="font-nexabold absolute top-8 left-8 flex flex-col items-start">
                <img src="{{ asset('images/logo_mediano.png') }}" alt="Logo" class="w-full sm:w-48 md:w-56 lg:w-full object-contain mb-2">
                
                <h2 class="text-left text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                    SECCIÓN
                </h2>
                <h2 class="text-left text-4xl leading-8 font-extrabold tracking-tight text-white sm:text-6xl">
                    PERSONAS
                </h2>
                <!-- Línea debajo del texto -->
                <div class="w-full max-w-xs h-1 bg-amber-500 mt-2"></div>
            </div>
            
            <!-- Texto inferior al pie del contenedor -->
            <div class="font-museo300 absolute bottom-4 left-0 right-0 px-4">
                <p class="text-center text-white text-xl">
                    Creemos que el talento y las habilidades de las personas lo cambian todo.
                    El valor humano es el motor de cambio hacia una sociedad más igualitaria.
                    ¿Quieres formar parte de ese motor? Ayúdanos a que más personas puedan transformar y mejorar su situación.
                </p>
            </div>
        </div>
    
        <!-- Imagen y contenido para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden py-24 block sm:hidden"
                style="background-image: url('{{ asset('images/seccionpersonas_respon.png') }}'); height: 80vh; background-size: cover;">

                <!-- Logo y texto centrados -->
                <div class="font-nexabold absolute top-10 left-1/2 transform -translate-x-1/2 text-center">
                    <img src="{{ asset('images/logo_mediano.png') }}" alt="Logo" class="w-full sm:w-48 md:w-56 lg:w-full object-contain mb-2">
                    
                    <h2 class="text-4xl leading-8 font-extrabold tracking-tight text-white">
                        SECCIÓN
                    </h2>
                    <h2 class="text-4xl leading-8 font-extrabold tracking-tight text-white">
                        PERSONAS
                    </h2>
                    <!-- Línea debajo del texto -->
                    <div class="w-full max-w-xs h-1 bg-amber-500 mt-2"></div>
                    </div>

                    <!-- Texto inferior al pie del contenedor -->
                    <div class="font-museo300 absolute bottom-4 left-0 right-0 px-4">
                    <p class="text-center text-white text-md">
                        Creemos que el talento y las habilidades de las personas lo cambian todo.
                        El valor humano es el motor de cambio hacia una sociedad más igualitaria.
                        ¿Quieres formar parte de ese motor? Ayúdanos a que más personas puedan transformar y mejorar su situación.
                    </p>
                </div>
            </div>
        </div>
    

        <!-- PREGUNTA ANTES DE LOS BLOQUES -->
        <div class="flex items-center justify-center text-center">
            <p class="font-nexabold text-6xl leading-tight tracking-tighter my-6 max-w-3xl mx-auto">
                <span class="text-amber-500">¿</span>
                <span>CÓMO FUNCIONA</span>
                <span class="text-red-700">?</span>
            </p>
        </div>
        
        <div class="flex items-center justify-center text-center">
            <p class="font-nexabold text-2xl leading-tight tracking-tighter my-6 max-w-3xl mx-auto">
                ¿QUIERES FORMAR PARTE DE ESE MÚSCULO ?, SÓLO NECESITAS 4 PASOS:
            </p>
        </div>         
        {{-- Fin de Pregunta --}}

        {{-- Aplicacion de Bloques --}}
        <div class="rounded-lg max-w-7xl mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">    
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                <!-- Bloque 1 -->
                <div class="relative flex justify-center items-center bg-cover bg-center"
                    style="background-image: url('{{ asset('images/base1.png') }}'); height: 50vh;">
                    <!-- Contenedor Blanco Cuadrado -->
                    <div class="absolute inset-0 border-4 border-white bg-white bg-opacity-30 flex flex-col items-center justify-center w-11/12 sm:w-3/4 h-11/12 sm:h-3/4 mx-auto my-auto">
                        <!-- Ajustes de posicionamiento del número para pantallas medianas -->
                        <div class="font-museo700 text-3xl sm:text-4xl text-white absolute top-4 left-4 md:top-6 md:left-6 lg:top-8 lg:left-8">1.</div>
                        <div class="text-center p-2 sm:p-4">
                            <!-- Reducimos el tamaño del texto para pantallas medianas -->
                            <p class="font-nexabold text-white text-xs sm:text-sm md:text-base">REGÍSTRATE Y CUÉNTANOS QUÉ TE GUSTA HACER Y CUÁLES SON TUS HABILIDADES</p>
                        </div>
                    </div>
                </div>
        
                <!-- Bloque 2 -->
                <div class="relative flex justify-center items-center bg-cover bg-center"
                    style="background-image: url('{{ asset('images/base2.png') }}'); height: 50vh;">
                    <div class="absolute inset-0 border-4 border-white bg-white bg-opacity-30 flex flex-col items-center justify-center w-11/12 sm:w-3/4 h-11/12 sm:h-3/4 mx-auto my-auto">
                        <div class="font-museo700 text-3xl sm:text-4xl text-white absolute top-4 left-4 md:top-6 md:left-6 lg:top-8 lg:left-8">2.</div>
                        <div class="text-center p-2 sm:p-4">
                            <p class="font-nexabold text-white text-xs sm:text-sm md:text-base">EXPLORA ENTRE TODAS LOS ANUNCIOS Y EVALÚA CUÁL ENCAJA MEJOR CON TUS CAPACIDADES.</p>
                        </div>
                    </div>
                </div>
        
                <!-- Bloque 3 -->
                <div class="relative flex justify-center items-center bg-cover bg-center"
                    style="background-image: url('{{ asset('images/base3.png') }}'); height: 50vh;">
                    <div class="absolute inset-0 border-4 border-white bg-white bg-opacity-30 flex flex-col items-center justify-center w-11/12 sm:w-3/4 h-11/12 sm:h-3/4 mx-auto my-auto">
                        <div class="font-museo700 text-3xl sm:text-4xl text-white absolute top-4 left-4 md:top-6 md:left-6 lg:top-8 lg:left-8">3.</div>
                        <div class="text-center p-2 sm:p-4">
                            <p class="font-nexabold text-white text-xs sm:text-sm md:text-base">EL ANUNCIO ESTÁ AHÍ. ENVÍA UN MENSAJE A LA ORGANIZACIÓN Y PROGRAMA TU PARTICIPACIÓN.</p>
                        </div>
                    </div>
                </div>
        
                <!-- Bloque 4 -->
                <div class="relative flex justify-center items-center bg-cover bg-center"
                    style="background-image: url('{{ asset('images/base4.png') }}'); height: 50vh;">
                    <div class="absolute inset-0 border-4 border-white bg-white bg-opacity-30 flex flex-col items-center justify-center w-11/12 sm:w-3/4 h-11/12 sm:h-3/4 mx-auto my-auto">
                        <div class="font-museo700 text-3xl sm:text-4xl text-white absolute top-4 left-4 md:top-6 md:left-6 lg:top-8 lg:left-8">4.</div>
                        <div class="text-center p-2 sm:p-4">
                            <p class="font-nexabold text-white text-xs sm:text-sm md:text-base">FORMALIZA EL ENCUENTRO Y RECIBE TU MONEDA SOCIAL.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
</x-app-layout>
