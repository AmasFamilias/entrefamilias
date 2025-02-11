<div>
    {{-- Para Desktop (se oculta en pantallas pequeñas) --}}
    <x-dropdown-link :href="route('talentos.index')"
        class="relative text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out transform hover:scale-110 hidden md:inline-flex mt-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
        </svg>
        {{ __('Talentos') }}

        @if (!$tieneTalentos)
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
    <x-responsive-nav-link :href="route('talentos.index')"
        class="relative block w-full text-center rounded-full px-4 py-2 text-sm leading-5 text-white 
        bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 
        transition duration-150 ease-in-out md:hidden mt-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
        </svg>
        {{ __('Talentos') }}

        @if (!$tieneTalentos)
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
