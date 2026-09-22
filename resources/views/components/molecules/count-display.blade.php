@props([
    'count' => 0,
])

<div class="py-4 bg-gray-50 rounded-lg border border-gray-100">
    <span class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">
        Aktueller Zählerstand
    </span>
    <div class="text-5xl font-bold text-indigo-600 tracking-tight">
        {{ $count }}
    </div>
</div>

