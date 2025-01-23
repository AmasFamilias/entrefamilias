{{-- Codigo Original --}}
{{-- <a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a> --}} 

{{-- Primera Opcion --}}
{{-- <a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out']) }}>{{ $slot }}</a> --}}

{{-- Adaptacion segun el Diseño Creado --}}
@php
$classes = 'block w-full px-4 py-2 text-start text-sm leading-5 text-white bg-amber-500 
            hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out';

$classes .= ($active ?? false) 
    ? ' font-nexabold border-2 border-amber-500 rounded-lg relative' 
    : ' font-nexalight';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if($active ?? false)
        <span class="absolute bottom-0 left-0 h-1 w-full bg-amber-500"></span>
    @endif
</a>


