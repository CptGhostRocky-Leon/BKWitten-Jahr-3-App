@props([
    'informationen',
    'showFilter' => false,
    'kategorie' => null,
])

<div
    class="min-h-screen bg-slate-50 px-4 py-10 sm:px-6 lg:px-8"
    x-data="{
        ausgewaehlteKategorien: [],
        filterOpen: false,
        suchbegriff: '',

        informationen: @js(
            $informationen->map(function ($information) {
                return [
                    'id' => $information->id,
                    'titel' => mb_strtolower($information->titel),
                    'nachricht' => mb_strtolower($information->nachricht),
                    'kategorie' => $information->kategorie,
                ];
            })->values()
        ),

        istSichtbar(id) {
            const information = this.informationen.find(
                info => info.id == id
            );

            if (!information) {
                return false;
            }

            const suche = this.suchbegriff.trim().toLowerCase();

            const kategoriePasst =
                this.ausgewaehlteKategorien.length === 0 ||
                this.ausgewaehlteKategorien.includes(information.kategorie);

            const suchePasst =
                suche === '' ||
                information.titel.includes(suche) ||
                information.nachricht.includes(suche);

            return kategoriePasst && suchePasst;
        },

        hatTreffer() {
            return this.informationen.some(
                information => this.istSichtbar(information.id)
            );
        }
    }"
>
    <div class="mx-auto max-w-4xl">

        @if (session('erfolg'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-2 text-sm text-green-700">
                {{ session('erfolg') }}
            </div>
        @endif

        <div class="mb-10 text-center">
            @if ($kategorie)
                <h1 class="mt-2 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    {{ $kategorie }}
                </h1>

                @php
                    $beschreibungen = [
                        'Veranstaltungen' => 'Hier findest du Informationen über vergangene und kommende Veranstaltungen.',
                        'Organisatorisches' => 'Hier findest du wichtige organisatorische Informationen für den Schulalltag.',
                        'Angebote' => 'Hier findest du Informationen zu außerunterrichtlichen Angeboten wie Zusatzkursen, AGs und weiteren Möglichkeiten, die Schule aktiv mitzugestalten.',
                    ];
                @endphp

                <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                    {{ $beschreibungen[$kategorie] ?? '' }}
                </p>
            @else
                <h1 class="mt-2 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    Was gibt's Neues?
                </h1>

                <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                    Hier findest du aktuelle Informationen und wichtige Ankündigungen.
                </p>
            @endif
        </div>

        <div class="relative mb-5 flex items-center gap-3">

            {{-- Suchleiste --}}
            <div class="relative flex-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                    aria-hidden="true"
                >
                    <circle cx="11" cy="11" r="7" />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m20 20-4-4"
                    />
                </svg>

                <input
                    type="search"
                    x-model="suchbegriff"
                    placeholder="Informationen durchsuchen..."
                    class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-4
                           text-sm text-slate-900 shadow-sm outline-none
                           placeholder:text-slate-400
                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
                />
            </div>

            @if ($showFilter)
                <button
                    type="button"
                    @click="filterOpen = !filterOpen"
                    :aria-expanded="filterOpen"
                    aria-controls="kategorie-filter"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200
                           bg-white px-3 py-2.5 text-sm font-medium text-slate-700
                           shadow-sm transition hover:bg-slate-50 hover:text-indigo-600
                           focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="h-5 w-5"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M7 12h10M10 18h4"
                        />
                    </svg>

                    <span>Filtern</span>
                </button>

                <div
                    id="kategorie-filter"
                    x-show="filterOpen"
                    x-cloak
                    x-transition
                    class="absolute right-0 top-full z-20 mt-2 w-64 rounded-xl
                           border border-slate-200 bg-white p-4 shadow-lg"
                >
                    <p class="mb-3 text-sm font-semibold text-slate-900">
                        Kategorien
                    </p>

                    <div class="space-y-3">

                        <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-700">
                            <input
                                type="checkbox"
                                value="Veranstaltungen"
                                x-model="ausgewaehlteKategorien"
                                class="h-4 w-4 rounded border-slate-300 text-indigo-600
                                       focus:ring-indigo-500"
                            >
                            <span>Veranstaltungen</span>
                        </label>

                        <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-700">
                            <input
                                type="checkbox"
                                value="Angebote"
                                x-model="ausgewaehlteKategorien"
                                class="h-4 w-4 rounded border-slate-300 text-indigo-600
                                       focus:ring-indigo-500"
                            >
                            <span>Angebote</span>
                        </label>

                        <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-700">
                            <input
                                type="checkbox"
                                value="Organisatorisches"
                                x-model="ausgewaehlteKategorien"
                                class="h-4 w-4 rounded border-slate-300 text-indigo-600
                                       focus:ring-indigo-500"
                            >
                            <span>Organisatorisches</span>
                        </label>

                    </div>
                </div>
            @endif
        </div>

        <div class="space-y-5">

            @forelse ($informationen as $information)

                <a
                    href="{{ route('information.show', $information) }}"
                    x-show="istSichtbar({{ $information->id }})"
                    class="block rounded-2xl focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                >
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
                                                d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 4.5h13.5A1.5 1.5 0 0 1 20.25 6v13.5a1.5 1.5 0 0 1-1.5 1.5H5.25A1.5 1.5 0 0 1 3.75 19.5V6A1.5 1.5 0 0 1 5.25 4.5Z"
                                            />
                                        </svg>

                                        <time datetime="{{ $information->veroeffentlicht_am }}">
                                            {{ \Carbon\Carbon::parse($information->veroeffentlicht_am)->format('d.m.Y, H:i') }}
                                        </time>
                                    </div>
                                @endif

                            </div>

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

                        </div>
                        <p class="mt-6 line-clamp-3 whitespace-pre-line leading-7 text-slate-700">
                            {{ $information->nachricht }}
                        </p>

                    </article>
                </a>

            @empty

                <div class="flex flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-12 text-center shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-7 w-7"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 14.25V6.75A2.25 2.25 0 0 0 17.25 4.5H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5A2.25 2.25 0 0 0 6.75 19.5H15"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 9h7.5M8.25 12h5.25"
                            />
                        </svg>
                    </div>

                    <h2 class="mt-5 text-lg font-semibold text-slate-900">
                        Keine Informationen vorhanden
                    </h2>

                    <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                        Aktuell gibt es keine Informationen, die hier angezeigt werden können.
                    </p>

                </div>

            @endforelse

            <div
                x-show="informationen.length > 0 && !hatTreffer()"
                x-cloak
                class="flex flex-col items-center justify-center rounded-2xl border border-slate-200
                       bg-white px-6 py-12 text-center shadow-sm"
            >
                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="h-7 w-7"
                        aria-hidden="true"
                    >
                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m20 20-4-4"
                        />
                    </svg>
                </div>

                <h2 class="mt-5 text-lg font-semibold text-slate-900">
                    Keine Treffer gefunden.
                </h2>

                <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                    Für deine Suche wurden keine passenden Informationen gefunden.
                </p>
            </div>

        </div>
    </div>
</div>