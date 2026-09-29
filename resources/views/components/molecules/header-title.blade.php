@props([
    'title' => '',
])

<div class="flex items-center justify-center flex-1 px-2 min-w-0">
    <h1 {{ $attributes->merge(['class' => 'text-lg font-bold text-slate-900 tracking-tight truncate text-center']) }}>
        {{ $slot->isEmpty() ? $title : $slot }}
    </h1>
</div>

