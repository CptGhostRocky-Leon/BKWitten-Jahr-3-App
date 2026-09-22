<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name', 'BKWitten Jahr 3') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col antialiased">
        {{-- Organismus: Navbar --}}
        <x-organisms.navbar />

        {{-- Seiteninhalt (Slot) --}}
        <main class="flex-1 flex flex-col">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
