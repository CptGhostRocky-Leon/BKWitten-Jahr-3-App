<div class="m-5 mt-10">
    <h1 class="text-3xl text-center">
        Was gibt's Neues?
    </h1>

    <div class="mt-7">
        @forelse ($informationen as $information)
            <article class="border-2 rounded-md mt-2 p-4">
                <h2 class="text-xl font-bold">
                    {{ $information->titel }}
                </h2>

                <p class="mt-2 whitespace-pre-line">
                    {{ $information->nachricht }}
                </p>

                @if ($information->veroeffentlicht_am)
                    <small class="text-gray-500">
                        {{ \Carbon\Carbon::parse($information->veroeffentlicht_am)->format('d.m.Y H:i') }}
                    </small>
                @endif
            </article>
        @empty
            <div class="border-2 rounded-md mt-2 p-4">
                Noch keine Beiträge vorhanden.
            </div>
        @endforelse
    </div>
</div>