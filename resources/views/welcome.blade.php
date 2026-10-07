<x-layouts.app :title="'Startseite'">
    <div class="flex-1 bg-slate-50 flex flex-col justify-center items-center p-6 antialiased">
        <div class="max-w-md w-full mb-8 text-center space-y-2">
            <span class="inline-block px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full uppercase tracking-wider">
                Schulprojekt
            </span>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                BKW Info
            </h1>
            <p class="text-sm text-slate-500">
                Ich bin eine Lokale Counter App zum Testen von Livewire-Komponenten.
            </p>
        </div>

        {{-- Interaktive Livewire-Komponente (Organism) --}}
        <livewire:counter />
    </div>
</x-layouts.app>
