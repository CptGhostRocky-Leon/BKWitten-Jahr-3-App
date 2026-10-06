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

    <x-molecules.select-field
        id="faq-section"
        label="Bereich auswählen"
        x-model="selectedSection"
        @change="openContent = {}"
    >
        <option value="">
            Bitte Bereich auswählen
        </option>

        @foreach ($sections as $id => $section)
            <option value="{{ $id }}">
                {{ $section['title'] }}
            </option>
        @endforeach
    </x-molecules.select-field>

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
                            <x-molecules.accordion-item
                                :title="$content['title'] ?? null"
                                :content-key="$contentKey"
                            >

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

                                                    <x-atoms.text-link :href="$block['url']">
                                                        {{ $block['link_text'] }}
                                                    </x-atoms.text-link>

                                                    {{ $block['text_after'] ?? '' }}
                                                </p>

                                            @elseif (($block['type'] ?? '') === 'heading')
                                                <h4
                                                    class="mb-3 mt-6 text-base font-semibold text-slate-900 first:mt-0"
                                                >
                                                    {{ $block['text'] }}
                                                </h4>

                                            @elseif (($block['type'] ?? '') === 'list')

                                                <ul class="mt-2 mb-8 list-disc space-y-2 pl-5 leading-7 text-slate-700">
                                                    @foreach ($block['items'] as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>

                                            @elseif (($block['type'] ?? '') === 'link')
                                                <div class="mb-4">
                                                    <x-atoms.text-link :href="$block['url']">
                                                        {{ $block['text'] }}
                                                    </x-atoms.text-link>
                                                </div>

                                            @elseif (($block['type'] ?? '') === 'button')

                                                <div class="mb-6">
                                                    <x-atoms.link-button :href="$block['url']">
                                                        {{ $block['text'] }}
                                                    </x-atoms.link-button>
                                                </div>

                                            @elseif (($block['type'] ?? '') === 'email')
                                                <div class="mb-8">
                                                    <x-atoms.email-link
                                                        :email="$block['email']"
                                                    />
                                                </div>

                                            @elseif (($block['type'] ?? '') === 'person')
                                                <x-molecules.person-info
                                                    :name="$block['name'] ?? null"
                                                    :room="$block['room'] ?? null"
                                                    :phone="$block['phone'] ?? null"
                                                    :mobile="$block['mobile'] ?? null"
                                                    :email="$block['email'] ?? null"
                                                    :focus="$block['focus'] ?? null"
                                                />

                                            //Tabelle
                                            @elseif (($block['type'] ?? '') === 'table')
                                                @if (!empty($block['title']))
                                                    <h4
                                                        class="mb-3 mt-6 text-base font-semibold text-slate-900"
                                                    >
                                                        {{ $block['title'] }}
                                                    </h4>
                                                @endif

                                                <div
                                                    class="mb-6 overflow-x-auto rounded-lg border border-slate-200"
                                                >

                                                    <table
                                                        class="w-full border-collapse text-left text-sm"
                                                    >
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
                            </x-molecules.accordion-item>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    @endforeach
</div>