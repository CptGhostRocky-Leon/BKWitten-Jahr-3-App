@props([
    'href' => '#',
    'target' => '_blank',
])

<a
    href="{{ $href }}"
    target="{{ $target }}"
    rel="noopener noreferrer"
    {{ $attributes->class([
        'font-medium text-blue-700 underline hover:text-blue-900',
    ]) }}
>
    {{ $slot }}
</a>
