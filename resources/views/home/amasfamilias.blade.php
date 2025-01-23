<x-app-layout>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Contenedor para pantallas grandes y medianas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden hidden sm:block"
             style="background-image: url('{{ asset('images/amasfamilias.png') }}'); height: 80vh; background-size: cover;">
            <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl h-full flex flex-col justify-center items-center">
                <div class="relative mb-6 flex justify-center items-center">
                    <!-- Logo grande -->
                    <img src="{{ asset('images/logo_grande.png') }}" alt="Logo" class="w-full sm:w-96 md:w-96 lg:w-96 object-contain">
                </div>
                <a href="https://amasfamilias.com/" target="_blank"
                   class="bg-slate-800 py-4 px-8 rounded-lg text-white font-nexabold uppercase underline text-center text-lg sm:text-xl md:text-2xl">
                    CONÓCENOS
                </a>
            </div>
        </div>

        <!-- Contenedor para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden sm:hidden"
             style="background-image: url('{{ asset('images/amasfamilias_respon.png') }}'); height: 80vh; background-size: cover;">
            <div class="w-full h-full flex flex-col justify-between">
                <!-- Logo grande para pantallas pequeñas, parte superior -->
                <div class="flex justify-center items-start pt-4">
                    <img src="{{ asset('images/logo_grande.png') }}" alt="Logo" class="w-full object-contain">
                </div>
                <!-- Botón "CONÓCENOS" en la parte inferior -->
                <div class="flex justify-center items-end pb-4">
                    <a href="https://amasfamilias.com/" target="_blank"
                       class="bg-slate-800 py-4 px-8 rounded-lg text-white font-nexabold uppercase underline text-center text-lg">
                        CONÓCENOS
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
