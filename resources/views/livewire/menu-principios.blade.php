<div>
    {{-- Para Desktop (se oculta en pantallas pequeñas) --}}
    <x-dropdown-link :href="route('principios.index')"
        class="relative text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out transform hover:scale-110 hidden md:inline-flex mt-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
        {{ __('Principios') }}

        @if (!$tienePrincipios)
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
    <x-responsive-nav-link :href="route('principios.index')"
        class="relative block w-full text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out md:hidden mt-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
        {{ __('Principios') }}

        @if (!$tienePrincipios)
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
