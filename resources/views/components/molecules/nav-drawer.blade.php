<div 
    x-show="drawerOpen" 
    x-cloak
    class="fixed inset-0 z-50 overflow-hidden" 
    role="dialog" 
    aria-modal="true"
>
    <x-atoms.overlay 
        @click="drawerOpen = false"
        x-show="drawerOpen"
        x-transition.opacity.duration.300ms
    />

    <div 
        x-show="drawerOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 max-w-xs w-full bg-white shadow-xl z-50 flex flex-col"
    >
        <div class="flex items-center justify-between px-5 h-16 border-b border-slate-100">
            <span class="font-bold text-slate-900 text-base">Navigation</span>
            
            <x-atoms.icon-button @click="drawerOpen = false" label="Menü schließen">
                <x-atoms.icons.close />
            </x-atoms.icon-button>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
            @foreach(config('navigation.main', []) as $item)
                @php
                    $hasRoute = !empty($item['route']) && Route::has($item['route']);
                    $href = $hasRoute ? route($item['route']) : ($item['url'] ?? '#');
                    $isActive = !empty($item['route']) && request()->routeIs($item['route']);
                @endphp

                <x-atoms.nav-link 
                    :href="$href" 
                    :active="$isActive"
                >
                    {{ $item['label'] ?? '' }}
                </x-atoms.nav-link>
            @endforeach
        </nav>

        {{-- Fußbereich --}}
        <div class="p-4 border-t border-slate-100 text-xs text-slate-400 text-center">
            BKWitten Jahr 3 App
        </div>
    </div>
</div>

