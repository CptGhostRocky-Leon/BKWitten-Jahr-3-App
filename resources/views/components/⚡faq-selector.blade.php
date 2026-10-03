<?php

use Livewire\Component;

new class extends Component
{
    public array $sections = [];

    public function mount(): void
    {
        $this->sections = config('faq.sections', []);
    }
};
?>

<div
    x-data="{
        selectedSection: '',
        openContent: {},

        toggleContent(key) {
            this.openContent[key] = !this.openContent[key];
        },

        isOpen(key) {
            return this.openContent[key] === true;
        }
    }"
    class="w-full"
>

    <label
        for="faq-section"
        class="mb-3 block text-xl font-semibold text-slate-900"
    >
        Bereich auswählen
    </label>

    <select
        id="faq-section"
        x-model="selectedSection"
        @change="openContent = {}"
        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3.5
               text-base text-slate-900 shadow-sm
               focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
    >
        <option value="">
            Bitte Bereich auswählen
        </option>

        @foreach ($sections as $id => $section)
            <option value="{{ $id }}">
                {{ $section['title'] }}
            </option>
        @endforeach
    </select>


    @foreach ($sections as $id => $section)

        <section
            x-show="selectedSection === '{{ $id }}'"
            x-cloak
            class="mt-6 rounded-lg bg-white p-6 shadow-sm"
            aria-labelledby="faq-{{ $id }}-title"
        >

            <h2
                id="faq-{{ $id }}-title"
                class="text-xl font-semibold text-slate-900"
            >
                {{ $section['title'] }}
            </h2>


            @if (!empty($section['description']))
                <p class="mt-3 leading-7 text-slate-700">
                    {{ $section['description'] }}
                </p>
            @endif


            @if (!empty($section['image']))
                <div class="mt-6">
                    <img
                        src="{{ asset($section['image']) }}"
                        alt="{{ $section['title'] }}"
                        class="h-auto max-w-full rounded-lg"
                    >
                </div>
            @endif


            @if (!empty($section['content']))

                <div class="mt-6 divide-y divide-slate-200">

                    @foreach ($section['content'] as $content)

                        @php
                            $contentKey = $id . '-' . $loop->index;
                        @endphp


                        <article>

                @if (!empty($content['title']))

                        //Accordion-Überschrift
                        <button
                            type="button"
                            @click="toggleContent('{{ $contentKey }}')"
                            class="flex w-full items-center justify-between gap-4 py-4 text-left"
                            :aria-expanded="isOpen('{{ $contentKey }}')"
                            aria-controls="faq-content-{{ $contentKey }}"
                        >
                            <span class="text-lg font-semibold text-slate-900">
                                {{ $content['title'] }}
                            </span>

                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center
                                    text-slate-600 transition-transform duration-200"
                                :class="{ 'rotate-180': isOpen('{{ $contentKey }}') }"
                                aria-hidden="true"
                            >
                                <span class="text-xl leading-none">
                                    ⌄
                                </span>
                            </span>
                        </button>
                    @endif
                                    
                    //Accordion-Inhalt
                    @if (!empty($content['title']))
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

                                @if (!empty($content['blocks']))
                                    <div>
                                        @foreach ($content['blocks'] as $block)
                                            @if (($block['type'] ?? '') === 'text')
                                                <p class="mb-4 leading-7 text-slate-700">
                                                    {{ $block['text'] }}
                                                </p>

                                            @elseif (($block['type'] ?? '') === 'text_with_link')
                                                <p class="mb-4 leading-7 text-slate-700">
                                                    {{ $block['text_before'] }}
                                                    <a
                                                        href="{{ $block['url'] }}"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="font-medium text-blue-700 underline hover:text-blue-900"
                                                    >
                                                        {{ $block['link_text'] }}
                                                    </a>
                                                    {{ $block['text_after'] ?? '' }}
                                                </p>


                                            //Überschrift
                                            @elseif (($block['type'] ?? '') === 'heading')
                                                <h4
                                                    class="mb-3 mt-6 text-base font-semibold text-slate-900 first:mt-0"
                                                >
                                                    {{ $block['text'] }}
                                                </h4>


                                            //Liste
                                            @elseif (($block['type'] ?? '') === 'list')
                                                <ul class="mt-2 mb-8 list-disc space-y-2 pl-5 leading-7 text-slate-700">
                                                    @foreach ($block['items'] as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>


                                            //Link
                                            @elseif (($block['type'] ?? '') === 'link')
                                                <div class="mb-4">
                                                    <a
                                                        href="{{ $block['url'] }}"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="font-medium text-blue-700 underline hover:text-blue-900"
                                                    >
                                                        {{ $block['text'] }}
                                                    </a>
                                                </div>

                                            @elseif (($block['type'] ?? '') === 'button')
                                                <div class="mb-6">
                                                    <a
                                                        href="{{ $block['url'] }}"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                    >
                                                        {{ $block['text'] }}
                                                    </a>
                                                </div>

                                            //Mail
                                            @elseif (($block['type'] ?? '') === 'email')
                                                <div class="mb-8">
                                                    <a
                                                        href="mailto:{{ $block['email'] }}"
                                                        class="font-medium text-blue-700 underline hover:text-blue-900"
                                                    >
                                                        {{ $block['email'] }}
                                                    </a>
                                                </div>

                                            //Person
                                            @elseif (($block['type'] ?? '') === 'person')
                                                <div class="mb-6 mt-6">
                                                    @if (!empty($block['name']))
                                                        <h4 class="font-semibold text-slate-900">
                                                            {{ $block['name'] }}
                                                        </h4>
                                                    @endif

                                                    <div class="mt-2 space-y-1 leading-7 text-slate-700">
                                                        @if (!empty($block['room']))
                                                            <p>
                                                                <strong>Raum:</strong>
                                                                {{ $block['room'] }}
                                                            </p>
                                                        @endif

                                                        @if (!empty($block['phone']))
                                                            <p>
                                                                <strong>Tel.:</strong>
                                                                {{ $block['phone'] }}
                                                            </p>
                                                        @endif

                                                        @if (!empty($block['mobile']))
                                                            <p>
                                                                <strong>Mobil:</strong>
                                                                {{ $block['mobile'] }}
                                                            </p>
                                                        @endif

                                                        @if (!empty($block['email']))
                                                            <p class="mb-6">
                                                                <strong>E-Mail:</strong>
                                                                <a href="mailto:{{ $block['email'] }}" class="text-blue-700 underline hover:text-blue-900">
                                                                    {{ $block['email'] }}
                                                                </a>
                                                            </p>
                                                        @endif

                                                        @if (!empty($block['focus']))
                                                            <p>
                                                                <strong>Schwerpunkt:</strong>
                                                                {{ $block['focus'] }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>


                                           //Tabelle
                                            @elseif (($block['type'] ?? '') === 'table')
                                                @if (!empty($block['title']))
                                                    <h4 class="mb-3 mt-6 text-base font-semibold text-slate-900">
                                                        {{ $block['title'] }}
                                                    </h4>
                                                @endif

                                                <div class="mb-6 overflow-x-auto rounded-lg border border-slate-200">
                                                    <table class="w-full border-collapse text-left text-sm">
                                                        {{-- Gruppierte Tabellenüberschrift --}}
                                                        @if (!empty($block['groupedHeaders']))
                                                            <thead class="bg-slate-100">
                                                                <tr>
                                                                    @foreach ($block['groupedHeaders'] as $header)
                                                                        <th
                                                                            @if (!empty($header['colspan']))
                                                                                colspan="{{ $header['colspan'] }}"
                                                                            @endif

                                                                            @if (!empty($header['rowspan']))
                                                                                rowspan="{{ $header['rowspan'] }}"
                                                                            @endif

                                                                            class="border-b border-r border-slate-200 px-4 py-3
                                                                                   text-center font-semibold text-slate-900
                                                                                   last:border-r-0"
                                                                        >
                                                                            {{ $header['text'] }}
                                                                        </th>
                                                                    @endforeach

                                                                </tr>

                                                                @if (!empty($block['subHeaders']))
                                                                    <tr>
                                                                        @foreach ($block['subHeaders'] as $header)
                                                                            <th
                                                                                class="border-r border-slate-200 px-4 py-3
                                                                                       text-center font-medium text-slate-700
                                                                                       last:border-r-0"
                                                                            >
                                                                                {{ $header }}
                                                                            </th>
                                                                        @endforeach
                                                                    </tr>
                                                                @endif
                                                            </thead>

                                                        //Überschrift Tabelle
                                                        @else

                                                            <thead class="bg-slate-100">
                                                                <tr>
                                                                    @foreach ($block['headers'] as $header)
                                                                        <th
                                                                            class="border-b border-r border-slate-200 px-4 py-3
                                                                                   font-semibold text-slate-900
                                                                                   last:border-r-0"
                                                                        >
                                                                            {{ $header }}
                                                                        </th>
                                                                    @endforeach
                                                                </tr>

                                                            </thead>
                                                        @endif

                                                        //Tabelleninhalt
                                                        <tbody>

                                                            @php
                                                                $lessonRowIndex = 0;
                                                            @endphp

                                                            @foreach ($block['rows'] as $row)
                                                                @if (($row['type'] ?? '') === 'pause')

                                                                    <tr>

                                                                        <td
                                                                            colspan="{{ count($block['headers']) }}"
                                                                            class="border-y border-slate-200 bg-slate-200
                                                                                   px-4 py-2 text-center text-sm
                                                                                   font-semibold text-slate-600"
                                                                        >
                                                                            Pause
                                                                        </td>
                                                                    </tr>


                                                                //Zeiel
                                                                @else

                                                                    <tr
                                                                        @if ($lessonRowIndex % 2 === 1)
                                                                            class="bg-slate-50"
                                                                        @else
                                                                            class="bg-white"
                                                                        @endif
                                                                    >

                                                                        @foreach ($row as $cell)
                                                                            <td
                                                                                class="border-r border-slate-200 px-4 py-3
                                                                                       text-slate-700 last:border-r-0"
                                                                            >
                                                                                {{ $cell }}
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>

                                                                    @php
                                                                        $lessonRowIndex++;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    @endforeach
</div>