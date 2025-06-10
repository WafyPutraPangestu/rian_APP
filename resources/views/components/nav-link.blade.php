@props(['active' => false, 'href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'px-3 py-2 text-sm font-medium ' . ($active ? 'text-gray-900 border-b-2 border-blue-600' : 'text-gray-700 hover:text-gray-900')]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900']) }}>
        {{ $slot }}
    </button>
@endif