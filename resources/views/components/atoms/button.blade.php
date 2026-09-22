@props([
    'variant' => 'primary', // 'primary', 'secondary', 'danger'
    'type' => 'button',
])

@php
    // Basis-Styling für alle Buttons (KISS: einfache Tailwind-Klassen)
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg transition focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer';

    // Varianten nach Atomic Design Prinzip (wiederverwendbare Stile)
    $variants = [
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500 shadow-sm',
        'secondary' => 'bg-gray-100 text-gray-700 hover:bg-gray-200 focus:ring-gray-400 border border-gray-300',
        'danger' => 'bg-rose-600 text-white hover:bg-rose-700 focus:ring-rose-500 shadow-sm',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

{{-- 
    Atom: Button
    Wiederverwendbarer Basis-Button. Alle weiteren Attribute wie wire:click
    oder disabled werden über $attributes dynamisch weitergereicht.
--}}
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>

