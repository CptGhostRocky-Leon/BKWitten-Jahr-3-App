@props([
    'variant' => 'primary',
    'type' => 'button',
])

<button 
    type="{{ $type }}" 
    {{ $attributes->class([
        'inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg transition focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer',
        'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500 shadow-sm' => $variant === 'primary',
        'bg-gray-100 text-gray-700 hover:bg-gray-200 focus:ring-gray-400 border border-gray-300' => $variant === 'secondary',
        'bg-rose-600 text-white hover:bg-rose-700 focus:ring-rose-500 shadow-sm' => $variant === 'danger',
    ]) }}
>
    {{ $slot }}
</button>
