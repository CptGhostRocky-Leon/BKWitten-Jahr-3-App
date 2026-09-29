<div class="max-w-xl mx-auto p-6 space-y-4">
    <h1 class="text-xl font-semibold text-slate-900">Neue Info anlegen</h1>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Titel</label>
        <x-atoms.input wire:model="titel" placeholder="Titel der Information" />
        @error('titel') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Inhalt</label>
        <x-atoms.textarea wire:model="nachricht" placeholder="Freitext..." />
        @error('nachricht') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
    <label class="block text-sm font-medium text-slate-700 mb-1">Anhang (PDF, PNG, JPG)</label>
    <x-atoms.input type="file" wire:model="anhang" />
    @error('anhang') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror

    @if ($anhang)
        <p class="text-xs text-slate-500 mt-1">Ausgewählt: {{ $anhang->getClientOriginalName() }}</p>
    @endif
    </div>

        <p class="text-sm text-slate-500">
        Veröffentlichungsdatum: {{ now()->format('d.m.Y') }} 
    </p>

    <x-atoms.button wire:click="veroeffentlichen">
        Veröffentlichen
    </x-atoms.button>
</div>