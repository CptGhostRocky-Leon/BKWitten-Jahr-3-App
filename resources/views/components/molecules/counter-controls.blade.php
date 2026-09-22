@props([
    'count' => 0,
])

<div class="flex items-center justify-center gap-3">
    <x-atoms.button 
        variant="secondary" 
        wire:click="decrement"
        :disabled="$count === 0"
        class="{{ $count === 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
    >
        - 1
    </x-atoms.button>

    <x-atoms.button 
        variant="danger" 
        wire:click="resetCount"
        :disabled="$count === 0"
        class="{{ $count === 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
    >
        Zurücksetzen
    </x-atoms.button>

    <x-atoms.button 
        variant="primary" 
        wire:click="increment"
    >
        + 1
    </x-atoms.button>
</div>

