@props([
    'destructive' => false,
])

@php
    $baseClasses =
        'relative flex cursor-default select-none gap-x-1 items-center rounded px-2 py-1.5 outline-none focus:outline-none transition duration-150 ease-in-out';
    $normal = 'hover:bg-neutral-100 focus:bg-gray-100 text-gray-800';
    $destructiveStyle = 'hover:bg-red-100 focus:bg-red-100 text-red-600';

    $finalClass = $baseClasses . ' ' . ($destructive ? $destructiveStyle : $normal);
@endphp

<a {{ $attributes->merge(['class' => $finalClass]) }}">
    {{ $slot }}
</a>
