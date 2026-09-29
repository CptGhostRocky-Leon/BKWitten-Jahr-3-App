@props([
    'color' => 'blue',
])

<span {{ $attributes->class([
    'inline-flex items-center rounded-md px-2.5 py-1 text-xs font-semibold ring-1 ring-inset',
    'bg-indigo-50 text-indigo-700 ring-indigo-600/20' => $color === 'blue',
    'bg-emerald-50 text-emerald-700 ring-emerald-600/20' => $color === 'green',
    'bg-gray-50 text-gray-600 ring-gray-500/10' => $color === 'gray',
]) }}>
    {{ $slot }}
</span>
