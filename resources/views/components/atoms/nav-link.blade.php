@props([
    'href' => '#',
    'active' => false,
])

<a 
    href="{{ $href }}" 
    @click="drawerOpen = false"
    @if($active) aria-current="page" @endif
    {{ $attributes->class([
        'flex items-center px-3 py-2.5 text-sm rounded-lg transition',
        'bg-indigo-50 text-indigo-700 font-semibold' => $active,
        'text-slate-700 hover:bg-slate-50 hover:text-indigo-600 font-medium' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>
