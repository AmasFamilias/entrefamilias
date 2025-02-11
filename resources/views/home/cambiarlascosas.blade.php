<x-app-layout>
        <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
            <!-- Imagen para pantallas grandes -->
            <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden hidden lg:block lg:py-24"
                  style="background-image: url('{{ asset('images/cambio.png') }}'); height: 80vh; background-size: cover;">

                  <div class="font-nexabold px-4 sm:px-6 lg:px-8 lg:max-w-full text-left flex flex-col pt-8">
                    <div class="space-y-0">
                        <!-- Primera línea -->
                        <p class="leading-none tracking-tight text-white">
                            <span class="text-slate-800 text-3xl md:text-5xl lg:text-7xl">¿</span>
                            <span class="text-md md:text-2xl lg:text-4xl">QUÉ PUEDES HACER</span>
                        </p>
                
                        <!-- Segunda línea -->
                        <p class="flex items-center leading-none tracking-tight text-white ml-8 md:ml-16 lg:ml-24">
                            <span class="text-xl md:text-2xl lg:text-4xl self-center">PARA</span>
                            <span class="text-2xl md:text-4xl lg:text-6xl ml-2">CAMBIAR</span>
                        </p>
                
                        <!-- Tercera línea -->
                        <p class="leading-none tracking-tight text-white ml-12 md:ml-24 lg:ml-40">
                            <span class="text-xl md:text-2xl lg:text-4xl align-top">LAS</span>
                            <span class="text-2xl md:text-4xl lg:text-6xl">COSAS</span>
                            <span class="text-red-500 text-3xl md:text-5xl lg:text-7xl">?</span>
                        </p>
                    </div>
                </div>                
            </div>
        </div>
      
        <!-- Imagen para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden lg:hidden"
            style="background-image: url('{{ asset('images/cambio_respon.png') }}'); height: 80vh; background-size: cover;">

            <div class="font-nexabold px-4 sm:px-6 lg:px-8 lg:max-w-full text-left h-full flex flex-col justify-center space-y-0 mt-32">
              <div class="space-y-0">
                  <!-- Primera línea -->
                  <p class="leading-none tracking-tight text-white">
                      <span class="text-slate-800 font-extrabold text-2xl sm:text-4xl">¿</span>
                      <span class="text-base sm:text-base">QUÉ PUEDES HACER</span>
                  </p>
          
                  <!-- Segunda línea (movida un poco a la derecha) -->
                  <p class="leading-none tracking-tight text-white ml-4 sm:ml-6">
                      <span class="text-xl sm:text-base self-center">PARA</span>
                      <span class="text-4xl sm:text-4xl font-extrabold ml-2">CAMBIAR</span>
                  </p>
          
                  <!-- Tercera línea (movida aún más a la derecha) -->
                  <p class="leading-none tracking-tight text-white ml-8 sm:ml-12">
                      <span class="text-xl sm:text-base align-top">LAS</span>
                      <span class="text-4xl sm:text-4xl font-extrabold">COSAS</span>
                      <span class="text-red-500 font-extrabold text-2xl sm:text-4xl">?</span>
                  </p>
              </div>
          </div>          
        </div>

        <div class="font-museo300 flex items-center justify-center text-center">
            <p class="leading-relaxed text-xl sm:text-2xl md:text-2xl my-10 max-w-5xl mx-auto text-center">
              Publica tus anuncios, participa en los procesos de selección o dona para apoyar al proyecto. 
              Si quieres, puedes hacerlo de la siguiente manera.
            </p>
        </div>
          
        <dv class="flex flex-col gap-16 lg:flex-col justify-center items-center p-6">
            <!-- Contenedor de imágenes con texto debajo -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/bizum.png') }}" alt="Bizum" 
                    class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
                    <span class="text-2xl font-bold text-slate-800 text-center">Bizum</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/cuentabancaria.png') }}" alt="Cuenta Bancaria" 
                    class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
                    <span class="text-xl font-bold text-slate-800 text-center">Cuenta Bancaria</span>
              </div>
              <div class="flex flex-col items-center">
                    <img src="{{ asset('images/donacionenweb.png') }}" alt="Donación en Página Web" 
                    class="flex-shrink-0 w-96 h-auto md:w-72 md:h-72 object-contain">
                    <a href="https://amasfamilias.com/" target="_blank" class="text-2xl font-bold text-slate-800 text-center underline">DONACIÓN EN PÁGINA WEB</a>
              </div>
            </div>
          </div>
</x-app-layout>
