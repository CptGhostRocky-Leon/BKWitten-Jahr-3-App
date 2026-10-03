@props([
    'title' => 'Startseite',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="manifest" href="/manifest.webmanifest">
        <meta name="theme-color" content="#ffffff"> 
        
        <title>{{ $title }} • {{ config('app.name', 'BKWitten') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body 
        x-data="{ drawerOpen: false, accountOpen: false }"
        @keydown.escape.window="drawerOpen = false; accountOpen = false"
        class="bg-slate-50 text-slate-900 min-h-screen flex flex-col antialiased"
    >
        {{-- Organismus: Sticky Header --}}
        <x-organisms.navbar :title="$title" />

        {{-- Molekül: Linkes Slide-Over Menü --}}
        <x-molecules.nav-drawer />

        {{-- Seiteninhalt (Slot) --}}
        <main class="flex-1 flex flex-col">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
