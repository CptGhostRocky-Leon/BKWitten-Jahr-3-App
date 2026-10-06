@props([
    'type' => 'button',
    'label' => null,
])

<button 
    type="{{ $type }}" 
    {{ $attributes
        ->merge(['aria-label' => $label])
        ->class([
            'inline-flex items-center justify-center w-11 h-11 rounded-lg',
            'text-slate-700 hover:bg-slate-100 hover:text-slate-900',
            'transition cursor-pointer focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500',
        ])
    }}
>
    {{ $slot }}
</button>
