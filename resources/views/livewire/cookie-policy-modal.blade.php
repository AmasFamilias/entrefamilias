<div>
    <button wire:click="openCookiePolicy" class="flex items-center text-gray-100 hover:text-amber-500 transition-all duration-300 group">
        <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-amber-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="font-medium">Política de Cookies</span>
    </button>

    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md px-4 py-8 sm:px-6 overflow-y-auto">
            <div class="w-full max-w-3xl bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-2xl transform transition-all duration-300 overflow-hidden">
                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Política de Cookies</h2>
                    <button wire:click="hideModal" class="text-gray-400 hover:text-red-500 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        
                <!-- Body -->
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto text-gray-700 text-sm sm:text-base leading-relaxed space-y-6 text-left">
                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            ¿Qué son las cookies?
                        </h3>
                        <p class="text-gray-600 text-left sm:text-left md:text-left lg:text-left">Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas nuestro sitio web. Estas permiten reconocer tu dispositivo, recordar tus preferencias y ofrecerte una experiencia más personalizada.</p>
                    </section>
        
                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            ¿Qué tipos de cookies utilizamos?
                        </h3>
                        <ul class="list-none space-y-2 text-left sm:text-left md:text-left lg:text-left">
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-2 h-2 mt-2 mr-2 bg-amber-500 rounded-full"></span>
                                <span><strong class="text-gray-800">Cookies analíticas:</strong> nos permiten entender cómo los usuarios interactúan con el sitio.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-2 h-2 mt-2 mr-2 bg-amber-500 rounded-full"></span>
                                <span><strong class="text-gray-800">Cookies de marketing:</strong> se usan para mostrar anuncios relevantes según tus intereses.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-2 h-2 mt-2 mr-2 bg-amber-500 rounded-full"></span>
                                <span><strong class="text-gray-800">Cookies funcionales:</strong> recuerdan tus preferencias y personalizan tu experiencia.</span>
                            </li>
                        </ul>
                    </section>
        
                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            ¿Cómo puedes gestionarlas?
                        </h3>
                        <p class="text-gray-600 text-left sm:text-left md:text-left lg:text-left">Puedes aceptar, rechazar o configurar tus preferencias de cookies a través del banner inicial o desde la configuración de tu navegador.</p>
                    </section>
        
                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Actualizaciones de esta política
                        </h3>
                        <p class="text-gray-600 text-left sm:text-left md:text-left lg:text-left">Esta política puede modificarse en cualquier momento. Te recomendamos revisarla periódicamente para estar al tanto de posibles cambios.</p>
                    </section>
                </div>
        
                <!-- Footer -->
                <div class="flex justify-end px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-t border-gray-200">
                    <button wire:click="hideModal" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>    
    @endif
</div>