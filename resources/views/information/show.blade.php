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

            <article class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                @php
                    $kategorie = $information->kategorie ?: 'Neuigkeit';

                    $farben = [
                        'Veranstaltungen' => 'bg-blue-100 text-blue-700',
                        'Angebote' => 'bg-green-100 text-green-700',
                        'Organisatorisches' => 'bg-orange-100 text-orange-700',
                        'Neuigkeit' => 'bg-indigo-100 text-indigo-700',
                    ];
                @endphp

                <span
                    class="inline-flex w-fit items-center rounded-full px-3 py-1 text-xs font-semibold
                           {{ $farben[$kategorie] ?? 'bg-indigo-100 text-indigo-700' }}"
                >
                    {{ $kategorie }}
                </span>

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
                                d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 4.5h13.5A1.5 1.5 0 0 1 20.25 6v13.5a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V6a1.5 1.5 0 0 1 1.5-1.5Z"
                            />
                        </svg>

                        <time datetime="{{ $information->veroeffentlicht_am }}">
                            {{ \Carbon\Carbon::parse($information->veroeffentlicht_am)->format('d.m.Y, H:i') }}
                        </time>
                    </div>
                @endif

                <div class="mt-8 whitespace-pre-line leading-7 text-slate-700">
                    {{ $information->nachricht }}
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