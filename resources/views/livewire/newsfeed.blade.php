<x-layouts.app title="Newsfeed">
    <x-organisms.newsfeed
        :informationen="$informationen"
        :show-filter="!isset($kategorie)"
        :kategorie="$kategorie ?? null"
    />
</x-layouts.app>