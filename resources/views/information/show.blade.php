<x-layouts.app title="Information">

    <div class="min-h-screen bg-slate-50 px-4 py-10 pb-40 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">

            <a
                href="{{ route('home') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800"
            >
                <span aria-hidden="true">←</span>
                Zurück zum Newsfeed
            </a>

            <article
                class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
            >

                @if ($information->kategorie)
                    @php
                        $farben = [
                            'Veranstaltungen' => 'bg-blue-100 text-blue-700',
                            'Angebote' => 'bg-green-100 text-green-700',
                            'Organisatorisches' => 'bg-orange-100 text-orange-700',
                        ];
                    @endphp

                    <span
                        class="inline-flex w-fit items-center rounded-full px-3 py-1 text-xs font-semibold
                               {{ $farben[$information->kategorie] ?? 'bg-slate-100 text-slate-700' }}"
                    >
                        {{ $information->kategorie }}
                    </span>
                @endif

                <h1 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    {{ $information->titel }}
                </h1>

                @if ($information->veroeffentlicht_am)
                    <div class="mt-3 flex items-center gap-2 text-sm text-slate-500">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            class="h-4 w-4"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 4.5h13.5A1.5 1.5 0 0 1 20.25 6v13.5a1.5 1.5 0 0 1-1.5 1.5H5.25A1.5 1.5 0 0 1 3.75 19.5V6A1.5 1.5 0 0 1 5.25 4.5Z"
                            />
                        </svg>

                        <time datetime="{{ $information->veroeffentlicht_am }}">
                            {{ \Carbon\Carbon::parse($information->veroeffentlicht_am)->format('d.m.Y, H:i') }}
                        </time>
                    </div>
                @endif

                @php
                    $abschnitte = preg_split(
                        "/\R{2,}/",
                        trim($information->nachricht)
                    );
                @endphp

                <div class="mt-8 space-y-5 text-slate-700">
                    @foreach ($abschnitte as $abschnitt)

                        @php
                            $teile = preg_split(
                                '/(https?:\/\/[^\s]+|www\.[^\s]+)/iu',
                                $abschnitt,
                                -1,
                                PREG_SPLIT_DELIM_CAPTURE
                            );
                        @endphp

                        <p class="leading-7">
                            @foreach ($teile as $teil)

                                @if (preg_match('/^(https?:\/\/|www\.)/i', $teil))

                                    @php
                                        $url = $teil;
                                        $abschluss = '';

                                        while (
                                            $url !== '' &&
                                            preg_match('/[.,!?;:)\]]$/', $url)
                                        ) {
                                            $abschluss = substr($url, -1) . $abschluss;
                                            $url = substr($url, 0, -1);
                                        }

                                        $href = str_starts_with(strtolower($url), 'www.')
                                            ? 'https://' . $url
                                            : $url;
                                    @endphp

                                    <a
                                        href="{{ $href }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="font-medium text-indigo-600 underline hover:text-indigo-800"
                                    >
                                        {{ $url }}
                                    </a>{{ $abschluss }}
                                @else
                                    {!! nl2br(e($teil)) !!}
                                @endif
                            @endforeach
                        </p>
                    @endforeach
                </div>

                @if ($information->anhaenge->isNotEmpty())
                    <div class="mt-10 border-t border-slate-200 pt-6">
                        <h2 class="text-lg font-semibold text-slate-900">
                            Anhänge
                        </h2>
                        <div class="mt-4 space-y-2">
                            @foreach ($information->anhaenge as $anhang)
                                <a
                                    href="{{ $anhang->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex min-w-0 items-center gap-3 rounded-lg border border-slate-200
                                           px-4 py-3 text-indigo-600 hover:bg-slate-50 hover:text-indigo-800"
                                >
                                    <span aria-hidden="true">📎</span>
                                    <span class="min-w-0 flex-1 truncate underline">
                                        {{ $anhang->dateiname }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                    </div>
                @endif
            </article>
        </div>
    </div>
</x-layouts.app>