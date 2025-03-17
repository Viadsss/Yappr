<!-- resources/views/components/dropdown.blade.php -->
@props([
    'align' => 'center',
    'width' => '56',
])

@php
    $alignmentClasses = match ($align) {
        'left' => 'left-0 origin-top-left',
        'right' => 'right-0 origin-top-right',
        default => '-translate-x-1/2 left-1/2',
    };
@endphp

<div x-data="{ open: false }" class="relative">
    {{-- Trigger --}}
    <div @click="open = !open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    {{-- Content --}}
    <div x-show="open" @click.away="open = false" x-transition:enter="ease-out duration-200"
        x-transition:enter-start="-translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="ease-in duration-100" x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-2 opacity-0"
        class="absolute z-50 w-{{ $width }} mt-2 {{ $alignmentClasses }}" x-cloak>
        <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
            {{ $content }}
        </div>
    </div>
</div>
