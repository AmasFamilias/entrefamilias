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
    </div>
</footer>
