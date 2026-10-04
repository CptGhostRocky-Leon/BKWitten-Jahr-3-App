@props([
    'email',
])

<a
    href="mailto:{{ $email }}"
    {{ $attributes->class([
        'font-medium text-blue-700 underline hover:text-blue-900',
    ]) }}
>
    {{ $slot->isEmpty() ? $email : $slot }}
</a>
