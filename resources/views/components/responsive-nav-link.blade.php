@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'block w-24 ps-3 pe-4 py-2 border-l-4 border-white text-start rounded-lg
        text-base font-medium text-white bg-amber-500 focus:outline-none 
        focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'

        : 'block w-24 ps-3 pe-4 py-2 border-l-4 border-transparent text-start rounded-lg
        text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-amber-300 
        focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
