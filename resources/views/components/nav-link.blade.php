<!-- components/nav-link.blade.php -->
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-es-xl px-5 py-2 bg-blue-500 text-sm font-medium leading-5 text-white hover:bg-blue-500/90  transition duration-300 ease-in-out'
            : 'inline-flex items-center px-5 py-2 text-sm font-medium leading-5 text-gray-500 hover:text-white hover:bg-blue-500 rounded-es-xl transition-all duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

