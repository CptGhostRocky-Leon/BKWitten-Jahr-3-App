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
            <span class="font-bold text-slate-900 text-base">BKW Info</span>
            
            <x-atoms.icon-button @click="drawerOpen = false" label="Menü schließen">
                <x-atoms.icons.close />
            </x-atoms.icon-button>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
            @foreach(config('navigation.main', []) as $item)
                @php
                    $hasRoute = !empty($item['route']) && Route::has($item['route']);

                    if ($hasRoute) {
                        if (!empty($item['kategorie'])) {
                            $href = route($item['route'], ['kategorie' => $item['kategorie']]);
                        } else {
                            $href = route($item['route']);
                        }
                    } else {
                        $href = $item['url'] ?? '#';
                    }

                    $isActive = !empty($item['route']) && request()->routeIs($item['route']);

                        if ($isActive && !empty($item['kategorie'])) {
                            $isActive = request()->route('kategorie') === $item['kategorie'];
                        }
                @endphp

                @if(($item['route'] ?? '') === 'faq')
                    <div x-data="{ faqOpen: false }">

                        <div
                            class="flex w-full items-center rounded-lg transition
                                {{ $isActive
                                        ? 'bg-indigo-50 text-indigo-700 font-semibold'
                                        : 'text-slate-700 hover:bg-slate-50 hover:text-indigo-600 font-medium' }}"
                        >
                            <a
                                href="{{ $href }}"
                                @click="drawerOpen = false"
                                class="flex-1 px-3 py-2.5 text-sm"
                            >
                                {{ $item['label'] ?? '' }}
                            </a>

                            <button
                                type="button"
                                @click="faqOpen = !faqOpen"
                                class="px-3 py-2.5"
                                :aria-expanded="faqOpen"
                                aria-label="FAQ Unterseiten anzeigen"
                            >
                                <svg
                                    class="w-4 h-4 transition-transform duration-200"
                                    :class="{ 'rotate-180': faqOpen }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m6 9 6 6 6-6"
                                    />
                                </svg>
                            </button>
                        </div>

                        <div
                            x-show="faqOpen"
                            x-cloak
                            class="ml-3 mt-1 space-y-1"
                        >
                            @foreach(config('faq.sections', []) as $sectionId => $section)
                                <a
                                    href="{{ route('faq') }}?section={{ $sectionId }}"
                                    @click="drawerOpen = false"
                                    class="block px-3 py-2 text-sm rounded-lg text-slate-600 hover:bg-slate-50 hover:text-indigo-600"
                                >
                                    {{ $section['title'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                @else
                    <x-atoms.nav-link
                        :href="$href"
                        :active="$isActive"
                    >
                        {{ $item['label'] ?? '' }}
                    </x-atoms.nav-link>
                @endif
            @endforeach
        </nav>
     
        {{-- Fußbereich --}}
        <div class="p-4 border-t border-slate-100 text-xs text-slate-400 text-center">
            BKW Info
        </div>
    </div>
</div>

