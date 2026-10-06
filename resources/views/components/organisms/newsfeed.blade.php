<div class="min-h-screen bg-slate-50 px-4 py-10 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
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

                        <span
                            class="w-fit rounded-full bg-indigo-50 px-3 py-1 text-xs
                                   font-semibold text-indigo-700"
                        >
                            Neuigkeit
                        </span>
                    </div>

                    <p class="mt-6 whitespace-pre-line leading-7 text-slate-700">
                        {{ $information->nachricht }}
                    </p>
                </article>
            @empty
                <div
                    class="rounded-2xl border border-dashed border-slate-300
                           bg-white px-6 py-14 text-center shadow-sm"
                >
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-indigo-50">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="h-7 w-7 text-indigo-600"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 10.5h.008v.008h-.008V10.5ZM12 10.5h.008v.008H12V10.5ZM8.25 10.5h.008v.008H8.25V10.5ZM6 19.5l-2.25 1.5.75-3.75A8.25 8.25 0 1 1 12 20.25a8.22 8.22 0 0 1-6-2.58"
                            />
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