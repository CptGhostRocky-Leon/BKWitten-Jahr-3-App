<div class="max-w-xl mx-auto p-6 space-y-4">
    @if ($erfolg)
        <div role="status" class="rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-2">
            {{ $erfolg }}
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Titel *
        </label>

        <x-atoms.input
            wire:model="titel"
            placeholder="Titel der Information"
        />

        @error('titel')
            <p class="text-sm text-rose-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label
            for="kategorie"
            class="block text-sm font-medium text-slate-700 mb-1"
        >
            Kategorie
        </label>

        <select
            id="kategorie"
            wire:model="kategorie"
            class="mt-1 block w-full rounded-lg border border-slate-300
                   bg-transparent px-3 py-2 text-sm text-slate-900
                   focus:border-indigo-500 focus:ring-indigo-500"
        >
            <option value="">Keine Kategorie ausgewählt</option>
            <option value="Veranstaltungen">Veranstaltungen</option>
            <option value="Angebote">Angebote</option>
            <option value="Organisatorisches">Organisatorisches</option>
        </select>

        @error('kategorie')
            <p class="text-sm text-rose-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Inhalt *
        </label>

        <x-atoms.textarea
            wire:model="nachricht"
            placeholder="Freitext..."
        />

        @error('nachricht')
            <p class="text-sm text-rose-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Anhänge (PDF, PNG, JPG)
        </label>

        <label
            for="anhang-input"
            class="block w-full cursor-pointer rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500"
        >
            Dateien auswählen
        </label>

        <input
            id="anhang-input"
            type="file"
            wire:model="anhang"
            multiple
            class="hidden"
        />

        @error('anhang')
            <p class="text-sm text-rose-600 mt-1">{{ $message }}</p>
        @enderror

        @error('anhang.*')
            <p class="text-sm text-rose-600 mt-1">{{ $message }}</p>
        @enderror

        @foreach ($anhang as $datei)
            <p class="text-xs text-slate-500 mt-1">
                Ausgewählt: {{ $datei->getClientOriginalName() }}
            </p>
        @endforeach
    </div>

    <p class="text-sm text-slate-500">
        Veröffentlichungsdatum: {{ now()->format('d.m.Y') }}
    </p>

    <x-atoms.button wire:click="veroeffentlichen">
        Veröffentlichen
    </x-atoms.button>

    <p class="text-xs text-slate-500">
        * Pflichtfelder
    </p>
</div>