@props(['variant' => 'default'])

@php
    $classes = match ($variant) {
        'default' => 'text-indigo-500 hover:text-indigo-600',
        'secondary' => 'text-gray-600 hover:text-gray-900',
    };
@endphp

<a
    {{ $attributes->merge(['class' => 'underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 ' . $classes]) }}>
    {{ $slot }}
</a>


{{-- @props(['variant' => 'default'])

@php
    $baseClasses = 'relative inline-block group transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500';
    $classes = match ($variant) {
        'default' => 'text-sm text-indigo-500',
        'secondary' => 'text-sm text-gray-500 hover:text-gray-700',
        default => 'text-sm'
    };
@endphp

<a {{ $attributes->merge(['class' => "$baseClasses $classes"]) }}>
    <span>{{ $slot }}</span>
    <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-current transition-all duration-150 ease-in-out group-hover:w-full"></span>
</a> --}}
