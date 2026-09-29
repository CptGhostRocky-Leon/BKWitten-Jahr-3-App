<div 
    x-show="accountOpen"
    @click.outside="accountOpen = false"
    x-cloak
    x-transition:enter="transition ease-out duration-150 transform"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-100 transform"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute right-0 top-full mt-2 w-56 rounded-xl bg-white shadow-lg ring-1 ring-black/5 divide-y divide-slate-100 z-50 focus:outline-none overflow-hidden"
    role="menu"
>
    {{-- Header --}}
    <div class="px-4 py-3">
        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Benutzerkonto</p>
        <p class="text-sm font-semibold text-slate-800 truncate">Nicht angemeldet</p>
    </div>

    {{-- Dynamische Menüeinträge (config/navigation.php) --}}
    <div class="py-1">
        @foreach(config('navigation.account', []) as $item)
            @php
                // Prüfen, ob Zielroute existiert
                $hasRoute = !empty($item['route']) && Route::has($item['route']);

                // Ziel-Link ermitteln, sonst Fallback-URL oder '#'
                $href = $hasRoute ? route($item['route']) : ($item['url'] ?? '#');

                // Nutzer schon auf seite
                $isActive = !empty($item['route']) && request()->routeIs($item['route']);
            @endphp

            {{-- Trennlinie: 'divider' => true gesetzt ist, eine Linie zeichnen --}}
            @if(!empty($item['divider']))
                <div class="border-t border-slate-100 my-1"></div>
            @endif

            {{-- Atomm dropdown --}}
            <x-atoms.dropdown-link 
                :href="$href" 
                :active="$isActive"
            >
                {{ $item['label'] ?? '' }}
            </x-atoms.dropdown-link>
        @endforeach
    </div>
</div>
