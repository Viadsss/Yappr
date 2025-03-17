@props(['variant' => 'primary', 'link' => false])

@php
    $baseClass =
        'inline-flex items-center gap-x-1 justify-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150';

    $variants = [
        'primary' =>
            'bg-gray-800 border-transparent text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'secondary' => 'bg-white border-gray-300 text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-indigo-500',
        'danger' => 'bg-red-600 border-transparent text-white hover:bg-red-500 active:bg-red-700 focus:ring-red-500',
        'accent' =>
            'bg-indigo-500 border-transparent text-white hover:bg-indigo-600 focus:bg-indigo-600 focus:ring-indigo-600 active:bg-indigo-700',
    ];

    $buttonClass = $baseClass . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($link)
    <a {{ $attributes->merge(['class' => $buttonClass]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $buttonClass]) }}>
        {{ $slot }}
    </button>
@endif
