@props([
    'color' => 'blue', // 'blue', 'green', 'gray'
])

@php
    // Farbvarianten für die Badge-Anzeige
    $colors = [
        'blue' => 'bg-indigo-50 text-indigo-700 ring-indigo-600/20',
        'green' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
        'gray' => 'bg-gray-50 text-gray-600 ring-gray-500/10',
    ];

    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

{{-- 
    Atom: Badge
    Kleines optisches Element zur Status- oder Zahlenanzeige.
--}}
<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-md px-2.5 py-1 text-xs font-semibold ring-1 ring-inset $colorClass"]) }}>
    {{ $slot }}
</span>

