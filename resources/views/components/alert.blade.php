@props([
    'type' => 'plain', // plain, info, success, warning, danger
])

@php
    $baseClasses = 'w-full rounded-lg px-4 py-3 text-sm border';
    $types = [
        'plain' => 'bg-gray-50 text-gray-800 border-gray-200',
        'info' => 'bg-blue-50 text-blue-800 border-blue-200',
        'success' => 'bg-green-50 text-green-800 border-green-200',
        'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
        'danger' => 'bg-red-50 text-red-800 border-red-200',
    ];

    $finalClass = $baseClasses . ' ' . ($types[$type] ?? $types['plain']);
@endphp

<div {{ $attributes->merge(['class' => $finalClass]) }}>
    {{ $slot }}
</div>
