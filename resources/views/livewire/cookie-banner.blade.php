<div>
    @if($show)
        <div class="fixed bottom-0 left-0 right-0 z-50">
            <div class="bg-gradient-to-r from-gray-50 to-white border-t border-gray-200 shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                        <!-- Contenido principal -->
                        <div class="flex-1 text-left">
                            <div class="flex items-center space-x-3">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Política de Cookies</h3>
                                    <p class="text-sm text-gray-600 mt-1">Utilizamos cookies para mejorar tu experiencia. Puedes aceptar, rechazar o personalizar tus preferencias.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4">
                            <button wire:click="rejectAll" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Rechazar
                            </button>

                            <button wire:click="togglePreferences" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Configurar
                            </button>

                            <button wire:click="acceptAll" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-md hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($showPreferences)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md px-4 py-8 sm:px-6 overflow-y-auto">
            <div class="w-full max-w-3xl bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-2xl transform transition-all duration-300 overflow-hidden">
                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Preferencias de Cookies</h2>
                    <button wire:click="togglePreferences" class="text-gray-400 hover:text-red-500 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        
                <!-- Body -->
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto text-gray-700 text-sm sm:text-base leading-relaxed space-y-6 text-left">
                    <div class="space-y-4 text-sm text-gray-700">
                        <x-cookie-toggle label="Cookies analíticas" model="preferences.analytics"
                            description="Nos ayudan a entender cómo interactúas con nuestro sitio." />
                        <x-cookie-toggle label="Cookies de marketing" model="preferences.marketing"
                            description="Para mostrarte contenido personalizado y anuncios relevantes." />
                        <x-cookie-toggle label="Cookies funcionales" model="preferences.functional"
                            description="Necesarias para algunas funciones del sitio." />
                    </div>
                </div>
        
                <!-- Footer -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-t border-gray-200">
                    <button wire:click="rejectAll" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                        Rechazar todas
                    </button>
                    <button wire:click="acceptSelected" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-md hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300 transform hover:scale-105">
                        Guardar preferencias
                    </button>
                    <button wire:click="acceptAll" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-md hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300 transform hover:scale-105">
                        Aceptar todas
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
