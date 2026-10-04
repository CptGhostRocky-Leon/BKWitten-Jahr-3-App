@props([
    'title' => null,
    'contentKey',
])

@if ($title)
    <button
        type="button"
        @click="toggleContent('{{ $contentKey }}')"
        class="flex w-full items-center justify-between gap-4 py-4 text-left"
        :aria-expanded="isOpen('{{ $contentKey }}')"
        aria-controls="faq-content-{{ $contentKey }}"
    >
        <span class="text-lg font-semibold text-slate-900">
            {{ $title }}
        </span>

        <span
            class="flex h-8 w-8 shrink-0 items-center justify-center
                   text-slate-600 transition-transform duration-200"
            :class="{ 'rotate-180': isOpen('{{ $contentKey }}') }"
        >
            <x-atoms.icons.chevron-down />
        </span>
    </button>
@endif

@if ($title)
    <div
        id="faq-content-{{ $contentKey }}"
        x-show="isOpen('{{ $contentKey }}')"
        x-cloak
        class="pb-6 pr-2"
    >
@else
    <div
        id="faq-content-{{ $contentKey }}"
        class="pb-6 pr-2"
    >
@endif

    {{ $slot }}

</div>