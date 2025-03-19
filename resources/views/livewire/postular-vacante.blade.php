<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center w-full">
    @if (session()->has('mensaje'))
        <div class="flex items-center gap-3 border border-green-600 bg-green-100 text-green-700 font-semibold p-3 my-5 text-sm rounded-lg w-full max-w-md animate-fade-in">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            <p class="flex-1 text-center">
                {{ session('mensaje') }}
            </p>
        </div>
    @else
        <form wire:submit.prevent="postularme" class="w-full max-w-md">
            <x-primary-button wire:loading.attr="disabled" class="w-full flex justify-center items-center">
                {{ __('Solicita Más Información') }}
                <div 
                    wire:loading wire:target="postularme"
                    class="inline-block h-4 w-4 ml-2 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </form>        
    @endif
</div>
