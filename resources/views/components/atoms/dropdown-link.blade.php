@props([
    'href' => '#',
    'active' => false,
])

<a 
    href="{{ $href }}" 
    @click="accountOpen = false" 
    role="menuitem"
    @if($active) aria-current="page" @endif
    {{ $attributes->class([
        'flex items-center px-4 py-2 text-sm transition',
        'bg-indigo-50 text-indigo-700 font-semibold' => $active,
        'text-slate-700 hover:bg-slate-50 hover:text-indigo-600' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>
