@props([
    'label',
    'id',
])

<div>
    <label
        for="{{ $id }}"
        class="mb-3 block text-xl font-semibold text-slate-900"
    >
        {{ $label }}
    </label>

    <select
        id="{{ $id }}"
        {{ $attributes->class([
            'w-full appearance-none rounded-lg border border-slate-300 bg-white px-4 py-3.5',
            'text-base text-slate-900 shadow-sm',
            'focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200',
        ]) }}
    >
        {{ $slot }}
    </select>
</div>
