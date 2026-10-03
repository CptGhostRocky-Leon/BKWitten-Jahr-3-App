<x-layouts.app :title="'Offline'">

    <div class="flex-1 bg-slate-50 flex flex-col justify-center items-center p-6">

        <div class="max-w-md w-full text-center">

            <h1 class="text-2xl font-bold text-slate-900">
                Du bist offline.
            </h1>

            <p class="mt-3 text-sm text-slate-500">
                Aktuelle Informationen sind momentan nicht verfügbar.
            </p>

            <a
                href="/faq"
                class="inline-block mt-6 px-4 py-2 bg-slate-900 text-white rounded-lg"
            >
                FAQ öffnen
            </a>

        </div>

    </div>

</x-layouts.app>