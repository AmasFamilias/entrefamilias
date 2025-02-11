<div>
    {{-- Para Desktop (se oculta en pantallas pequeñas) --}}
    <x-dropdown-link :href="route('habilidades.index')"
        class="relative text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out transform hover:scale-110 hidden md:inline-flex"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
        </svg>
        {{ __('Habilidades') }}

        @if (!$tieneHabilidades)
            <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2">
                <div class="relative animate-pulse">
                    <span class="flex h-5 w-5">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex h-5 w-5 rounded-full bg-gradient-to-r from-red-500 to-orange-500 text-white 
                            text-xs font-bold flex items-center justify-center shadow-lg">
                            ⚠
                        </span>
                    </span>
                </div>
            </div>
        @endif
    </x-dropdown-link>

    {{-- Para Responsive (se oculta en pantallas grandes) --}}
    <x-responsive-nav-link :href="route('habilidades.index')"
        class="relative block w-full text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out md:hidden"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
        </svg>
        {{ __('Habilidades') }}

        @if (!$tieneHabilidades)
        <div class="absolute top-0 right-1/2 translate-x-1/2 -translate-y-1/2 md:right-0 md:translate-x-0">
            <div class="relative animate-pulse">
                <span class="flex h-5 w-5">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex h-5 w-5 rounded-full bg-gradient-to-r from-red-500 to-orange-500 text-white 
                        text-xs font-bold flex items-center justify-center shadow-lg">
                        ⚠
                    </span>
                </span>
            </div>
        </div>
    @endif

    </x-responsive-nav-link>
</div>
