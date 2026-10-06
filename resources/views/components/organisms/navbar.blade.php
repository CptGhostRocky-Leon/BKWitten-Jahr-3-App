@props([
    'title' => 'Startseite',
])

<header class="sticky top-0 z-30 bg-white border-b border-slate-200 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16 relative">
            
            {{-- Links: Hamburger-Button (Atom) --}}
            <div class="flex items-center">
                <x-atoms.icon-button 
                    @click="drawerOpen = true" 
                    label="Hauptmenü öffnen"
                >
                    <x-atoms.icons.hamburger />
                </x-atoms.icon-button>
            </div>

            {{-- Mitte: Dynamischer Seitentitel (Molekül) --}}
            <x-molecules.header-title :title="$title" />

            {{-- Rechts: Account-Button (Atom) + Dropdown (Molekül) --}}
            <div class="flex items-center relative">
                <x-atoms.icon-button 
                    @click="accountOpen = !accountOpen" 
                    label="Benutzerkonto öffnen"
                >
                    <x-atoms.icons.user />
                </x-atoms.icon-button>

                {{-- Molekül: Rechtes Ausklappmenü --}}
                <x-molecules.account-dropdown />
            </div>

        </div>
    </div>
</header>
