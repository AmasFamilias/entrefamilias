<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">

    @if (@session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg w-full sm:w-96 text-center">
            {{ session('mensaje') }}
        </p>
    @else
        <form wire:submit.prevent='postularme'>
            <x-primary-button wire:loading.attr="disabled" class="w-ful text-center">
                {{ __('Solicita Más Información') }}
                <div 
                    wire:loading wire:target="postularme"
                    class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid 
                    border-current border-r-transparent align-[-0.125em] text-white 
                    motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                    role="status">
                </div>
            </x-primary-button>
        </form>        
    @endif
</div>
