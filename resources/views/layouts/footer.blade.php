<footer class="relative bg-cover bg-center text-white py-16" style="background-image: url('{{ asset('images/footer_web.png') }}');">
    <div class="container mx-auto text-center space-y-8">
        <p class="leading-relaxed font-segoe_ui text-sm md:text-2xl lg:text-2xl">
            Si tienes cualquier tipo de duda, ponte en contacto con nosotros y te atenderemos lo antes posible 
            (Danos la oportunidad de ayudarte). Nuestros métodos de contacto son:
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-12">
            <!-- Enlace de Teléfonos -->
            <div class="font-segoe_ui flex items-center text-sm md:text-base">
                <img src="{{ asset('images/mobile.png') }}" alt="Icono Teléfono" class="h-9 w-6 mr-3">
                <a href="tel:+34616394588" class="hover:underline">616394588</a>/ 
                <a href="tel:+34681349650" class="hover:underline">681349650</a>
            </div> 
        
            <!-- Enlace de Correo -->
            <div class="font-segoe_ui flex items-center text-sm md:text-base">
                <img src="{{ asset('images/icono_mensaje.png') }}" alt="Icono Email" class="h-7 w-9 mr-3">
                <a href="mailto:info@amasfamilias.com" class="hover:underline">info@amasfamilias.com</a>
            </div>
        </div>
        
        <p class="text-xl md:text-2xl">
            <span class="text-amber-500 font-nexabold">¡</span>
            <span class= "font-nexabold">YA VERÁS</span>
            <span class="text-red-600 font-nexabold">!</span> 
            <span class="font-museo300">todo</span> 
            <span class="font-nexabold">CAMBIA</span> 
            <span class="font-museo300">con una</span>
            <span class="font-nexabold">OPORTUNIDAD.</span> 
        </p>

        <!-- Enlaces de Políticas -->
        <div class="mt-12 pt-8 border-t border-gray-100">
            <div class="flex flex-wrap justify-center items-center gap-8 text-sm">
                @livewire('cookie-policy-modal')
                
                <a href="{{ route('terminos-condiciones') }}" class="flex items-center text-gray-100 hover:text-amber-500 transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-amber-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="font-medium">Términos y Condiciones</span>
                </a>

                <a href="{{ route('politica-privacidad') }}" class="flex items-center text-gray-100 hover:text-amber-500 transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-amber-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-medium">Política de Privacidad</span>
                </a>

                <a href="{{ route('aviso-legal') }}" class="flex items-center text-gray-100 hover:text-amber-500 transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-amber-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                    <span class="font-medium">Aviso Legal</span>
                </a>

                @livewire('normas-modal')
            </div>
            <p class="text-xs text-gray-400 text-center mt-4">
                © {{ date('Y') }} EntreFamilias. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>
