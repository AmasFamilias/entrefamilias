@props(['active'])

{{-- @php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp --}}

@php
$classes = 'inline-flex items-center px-1 py-1 rounded-lg text-sm font-medium leading-5 
            transition duration-150 ease-in-out';

$classes .= ($active ?? false) 
    ? ' bg-amber-500 text-white underline font-bold border-2 border-amber-500 focus:outline-none 
       focus:bg-amber-600 font-nexabold' 
    : ' border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-amber-300 
       focus:outline-none focus:text-gray-700 focus:border-gray-300 font-nexalight';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
