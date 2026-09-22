<div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 max-w-md mx-auto text-center space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">
            Schulprojekt Livewire Test
        </h2>
        
        <x-atoms.badge :color="$count > 0 ? 'green' : 'gray'">
            {{ $count > 0 ? 'Aktiv' : 'Bereit' }}
        </x-atoms.badge>
    </div>

    {{-- Molekül: Zähleranzeige --}}
    <x-molecules.count-display :count="$count" />

    {{-- Molekül: Button-Gruppe --}}
    <x-molecules.counter-controls :count="$count" />
</div>
