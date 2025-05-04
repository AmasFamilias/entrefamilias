<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}"> 
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                @auth
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                            {{ __('Mis Anuncios') }}
                        </x-nav-link>
                
                        {{-- <x-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                            {{ __('Crear un Anuncio') }}
                        </x-nav-link> --}}
                        <x-nav-link 
                            href="#"
                            :active="request()->routeIs('vacantes.create')" 
                            x-data 
                            @click.prevent="Livewire.dispatch('abrirNormas', { ruta: '{{ route('vacantes.create') }}' })">
                            {{ __('Crear un Anuncio') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <a href="{{ route('conversaciones.index') }}" 
                        class="mr-2 w-7 h-7 rounded-full flex flex-col justify-center">
                        <!-- Icono de conversación -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </a>
                
                    <!-- Icono de Mensajes Nuevos -->
                    <a href="{{ route('notificaciones.mensajes') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                        <!-- Contador de Mensajes Nuevos -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() }}
                            </span>
                        @endif
                    </a>

                    <!-- Icono de Notificaciones Nuevas -->
                    <a href="{{ route('notificaciones.index') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <!-- Icono de Notificaciones Nuevas -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>

                        <!-- Contador de Notificaciones Nuevas -->
                        @php
                            $totalNotificaciones = Auth::user()->unreadNotifications
                                ->whereIn('type', ['App\Notifications\NuevoCandidato', 'App\Notifications\InvitarColaborador'])
                                ->count();
                        @endphp

                        @if($totalNotificaciones > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ $totalNotificaciones }}
                            </span>
                        @endif
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <!-- Imagen de perfil -->
                                <img src="{{ Auth::user()->profile_image ? asset('storage/profiles/' . Auth::user()->profile_image) : asset('images/datospersonales.png') }}" 
                                     alt="Imagen de Perfil" 
                                     class="h-8 w-8 rounded-full object-cover mr-2 border border-gray-300 shadow-sm">
                        
                                <!-- Nombre del usuario -->
                                <div>{{ Auth::user()->name }}</div>
                        
                                <!-- Ícono de flecha -->
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        

                        <x-slot name="content">
                            <!-- Sección de Información General -->
                            <h3 class="font-semibold text-base text-gray-800 leading-tight">Información General</h3>
                            <x-dropdown-link :href="route('profile.edit')"
                                class="text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mb-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                              
                                {{ __('Tus Datos') }}
                            </x-dropdown-link>

                            @auth
                                @if (auth()->user()->tieneOrganizacion() || auth()->user()->rol == 2) 
                                    <x-dropdown-link :href="route('organizaciones.index')"
                                        class="text-center rounded-full px-4 py-2 text-sm 
                                        leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                        focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                        </svg>
                                        {{ __('Tu Organización') }}
                                    </x-dropdown-link>
                                @endif
                            @endauth

                            <!-- Sección de Personalización y Características -->
                            <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">Competencias</h3>

                            {{-- CONTROL DE LAS HABILIDADES --}}
                            @livewire('menu-habilidades')
                        
                            {{-- CONTROL DE LOS TALENTOS --}}
                            @livewire('menu-talentos')
                        
                            {{-- CONTROL DE LOS PRINCIPIOS --}}
                            @livewire('menu-principios')
                        
                            <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">¡Hasta Luego!</h3>
                            <!-- Cerrar Sesión -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-center rounded-full px-4 py-2 text-sm 
                                    leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                    focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out mt-2"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                  
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>                        
                    </x-dropdown>
                @endauth
                
                @php
                    $currentUrl = url()->current();
                @endphp

                @guest
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('funcionamiento')"
                                    :active="str_contains($currentUrl, route('funcionamiento'))">
                            {{ __('¿Cómo Funciona?') }}
                        </x-nav-link>

                        <x-nav-link :href="route('seccionpersonas')"
                                    :active="str_contains($currentUrl, route('seccionpersonas'))">
                            {{ __('Personas') }}
                        </x-nav-link>

                        <x-nav-link :href="route('cambiarlascosas')"
                                    :active="str_contains($currentUrl, route('cambiarlascosas'))">
                            {{ __('El Cambio') }}
                        </x-nav-link>
                    
                        <x-nav-link :href="route('amasfamilias')"
                                    :active="str_contains($currentUrl, route('amasfamilias'))">
                            {{ __('A+Familias') }}
                        </x-nav-link>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')">
                            {{ __('Iniciar Sesión') }}
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('vacantes.index')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                    leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out" 
                    :active="request()->routeIs('vacantes.index')">
                        {{ __('Anuncios') }}
                    </x-responsive-nav-link>

                    {{-- <x-responsive-nav-link :href="route('vacantes.create')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                    leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out" 
                    :active="request()->routeIs('vacantes.create')">
                        {{ __('Crear un Anuncio') }}
                    </x-responsive-nav-link> --}}
                    <x-responsive-nav-link 
                        href="#"
                        class="block w-full text-center rounded-full px-4 py-2 text-sm 
                            leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none 
                            focus:bg-amber-600 transition duration-150 ease-in-out"
                        :active="request()->routeIs('vacantes.create')"
                        x-data
                        @click.prevent="Livewire.dispatch('abrirNormas', { ruta: '{{ route('vacantes.create') }}' })">
                        {{ __('Crear un Anuncio') }}
                    </x-responsive-nav-link>

                </div>

                <!-- Opcion de Mis Conversaciones -->
                <div class="flex gap-2 items-center p-3">
                    <a href="{{ route('conversaciones.index') }}" 
                        class="mr-2 w-7 h-7 rounded-full flex flex-col justify-center">
                        <!-- Icono de conversación -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </a>
                    <p class="text-base font-medium text-gray-600">
                    Mis Conversaciones
                    </p>
                </div>

                <!-- Icono de Mensajes Nuevos -->
                <div class="flex gap-2 items-center p-3">
                    <a href="{{ route('notificaciones.mensajes') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <!-- Contador de Mensajes Nuevos -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoMensaje')->count() }}
                            </span>
                        @endif
                    </a>
                    <p class="text-base font-medium text-gray-600">
                        Mensajes Nuevos
                    </p>
                </div>

                <!-- Icono de Notificaciones Nuevas -->
                <div class="flex gap-2 items-center p-3">
                        <a href="{{ route('notificaciones.index') }}" 
                        class="relative inline-flex items-center mr-2 w-7 h-7 bg-slate-800 hover:bg-amber-500 rounded-md flex-col justify-center text-sm font-extrabold text-white">

                        <!-- Icono de Notificaciones Nuevas -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>
                        <!-- Contador de Notificaciones Nuevas -->
                        @if(Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\NuevoCandidato')->count() }}
                            </span>
                        @endif
                    </a>
                    <p class="text-base font-medium text-gray-600">
                        Notificaciones 
                    </p>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                <div class="mt-3 space-y-1">
                    <!-- Sección de Información General -->
                    <h3 class="font-semibold text-base text-gray-800 leading-tight">Información General</h3>
                        <x-responsive-nav-link :href="route('profile.edit')" class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                    
                            {{ __('Tus Datos') }}
                        </x-responsive-nav-link>
 
                        @auth
                            @if (auth()->user()->tieneOrganizacion() || auth()->user()->rol == 2) 
                                <x-responsive-nav-link :href="route('organizaciones.index')" 
                                    class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                    leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                    focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>
                                    {{ __('Tu Organización') }}
                                </x-responsive-nav-link>
                            @endif
                        @endauth
                    
                    <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">Competencias</h3>
                        
                        {{-- CONTROL DE LAS HABILIDADES - MODO RESPONSIVO--}}
                        @livewire('menu-habilidades')
                            
                        {{-- CONTROL DE LOS TALENTOS --}}
                        @livewire('menu-talentos')
                            
                        {{-- CONTROL DE LOS PRINCIPIOS --}}
                        @livewire('menu-principios')

                    <h3 class="font-semibold text-base text-gray-800 leading-tight mt-4">¡Hasta Luego!</h3>
                    <!-- Cerrar Sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block w-full text-center rounded-full px-4 py-2 text-sm 
                                leading-5 text-white bg-amber-500 hover:bg-amber-600 
                                focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out"    
                            >
                                {{ __('Cerrar Sesión') }}
                            </x-responsive-nav-link>
                        </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('funcionamiento')">
                    {{ __('¿Cómo Funciona?') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('seccionpersonas')">
                    {{ __('Personas') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('cambiarlascosas')">
                    {{ __('El Cambio') }}
                </x-responsive-nav-link>
            
                <x-responsive-nav-link :href="route('amasfamilias')">
                    {{ __('A+Familias') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('login')">
                    {{ __('Iniciar Sesión') }}
                </x-responsive-nav-link>
                
                {{-- <x-responsive-nav-link :href="route('register')">
                    {{ __('Crear Cuenta') }}
                </x-responsive-nav-link> --}}
            </div>
        @endguest
    </div>
</nav>
