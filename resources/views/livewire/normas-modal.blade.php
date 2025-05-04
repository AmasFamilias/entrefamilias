<div>
    <button wire:click="verNormas" class="flex items-center text-gray-100 hover:text-amber-500 transition-all duration-300 group">
        <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-amber-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <span class="font-medium">Normas de la Comunidad</span>
    </button>

    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md px-4 py-8 sm:px-6 overflow-y-auto">
            <div class="w-full max-w-3xl bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-2xl transform transition-all duration-300 overflow-hidden">
                
                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Normas de la Comunidad</h2>
                    <button wire:click="$set('showModal', false)" class="text-gray-400 hover:text-red-500 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto text-gray-700 text-sm sm:text-base leading-relaxed space-y-6 text-left">
                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <p class="text-gray-600 text-left sm:text-left md:text-left lg:text-left">
                            Para mantener un ambiente respetuoso, solidario y seguro en nuestra comunidad, es fundamental cumplir con las siguientes normas. El incumplimiento podría conllevar la suspensión o expulsión de la plataforma.
                        </p>
                    </section>

                    <section class="bg-white/50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <ul class="list-none space-y-4 text-left sm:text-left md:text-left lg:text-left">
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>No compartas anuncios con contenido publicitario no solicitado, como spam, cadenas o promociones ajenas a la plataforma.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>Evita difundir información falsa, exagerada o engañosa. La confianza es la base de esta comunidad.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>Respeta los derechos de autor y evita compartir imágenes, textos o materiales sin el permiso adecuado.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>No uses imágenes de menores sin autorización expresa de sus tutores legales.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>Promueve el respeto, la empatía y la inclusión en todos tus intercambios. Este es un espacio de apoyo mutuo.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-7 h-7 text-amber-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4" />
                                </svg>
                                <span>Publica únicamente anuncios reales, claros y con intención genuina de ayudar o recibir ayuda.</span>
                            </li>
                        </ul>
                    </section>
                </div>

                <!-- Footer -->
                <div class="flex justify-end px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-t border-gray-200">
                    @if($esInformacion)
                        <button wire:click="$set('showModal', false)"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                            Cerrar
                        </button>
                    @else
                        <button wire:click="aceptarNormas"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                            Acepto y Continuar
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
