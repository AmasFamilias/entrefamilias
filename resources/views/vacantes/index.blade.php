<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Anuncios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (@session()->has('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 5000)" 
                    class="mt-2 text-indigo-500"
                >
                <div class="flex items-center">
                    <!-- Ícono SVG de éxito en indigo -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 10-1.414-1.414L9 9.586 7.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <h4 class="font-bold text-indigo-500">¡Éxito!</h4>
                </div>
                    <x-input-error :messages="session('success')" class="text-indigo-500 bg-indigo-100 border-indigo-500" />
                </div>
            @endif

            <livewire:mostrar-vacantes/> 
            
        </div>
    </div>
</x-app-layout>
