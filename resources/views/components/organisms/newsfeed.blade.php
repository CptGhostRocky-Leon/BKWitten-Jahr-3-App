<div class="min-h-screen bg-slate-50 px-4 py-10 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        @if (session('erfolg'))
            <div class="mb-6 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-2">
                {{ session('erfolg') }}
            </div>
        @endif

        <div class="mb-10 text-center">
            <h1 class="mt-2 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                Was gibt's Neues?
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                Hier findest du aktuelle Informationen und wichtige Ankündigungen.
            </p>
        </div>

        <div class="space-y-5">
            @forelse ($informationen as $information)
                <article
                    class="group relative overflow-hidden rounded-2xl border border-slate-200
                           bg-white p-6 shadow-sm transition duration-200
                           hover:-translate-y-1 hover:shadow-lg sm:p-8"
                >
                    <div class="absolute inset-y-0 left-0 w-1 bg-indigo-600"></div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div class="min-w-0">
                            <h2 class="text-2xl font-bold text-slate-900">
                                {{ $information->titel }}
                            </h2>

                            @if ($information->veroeffentlicht_am)
                                <div class="mt-2 flex items-center gap-2 text-sm text-slate-500">
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
                        </div>

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
                    </div>

                    <p class="mt-6 whitespace-pre-line leading-7 text-slate-700">
                        {{ $information->nachricht }}
                    </p>

                    @foreach ($information->anhaenge as $anhang)
                        <a href="{{ $anhang->url }}" target="_blank" class="block mt-4 text-indigo-600 underline">
                            {{ $anhang->dateiname }}
                        </a>
                    @endforeach

                </article>
            @empty
                <div
                    class="rounded-2xl border border-dashed border-slate-300
                           bg-white px-6 py-14 text-center shadow-sm">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-indigo-50">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-7 w-7 text-indigo-600"
                            aria-hidden="true">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3.75a8.25 8.25 0 0 0-7.1 12.45L4.5 20.25l4.05-1.35A8.25 8.25 0 1 0 12 3.75Z"
                            />
                            <circle cx="8.75" cy="12" r=".6" fill="currentColor" stroke="none" />
                            <circle cx="12" cy="12" r=".6" fill="currentColor" stroke="none" />
                            <circle cx="15.25" cy="12" r=".6" fill="currentColor" stroke="none" />
                        </svg>
                    </div>

                    <h2 class="mt-5 text-xl font-semibold text-slate-900">
                        Noch keine Beiträge vorhanden
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Sobald es neue Informationen gibt, werden sie hier angezeigt.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>