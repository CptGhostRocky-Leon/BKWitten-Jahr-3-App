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
    <body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col antialiased">
        
    
        <header>
            <x-organisms.navbar />
        </header>
        
        <main class="flex-1 flex flex-col">
            <x-organisms.newsfeed></x-organisms.newsfeed>
            
            {{--
            {{ $slot }}
            --}}
        </main>

        <footer class="border-t bg-white">
            <div class="mx-auto max-w-7xl px-6 py-4 text-sm text-gray-500">

            <div class="flex justify-center gap-8 ">
                <a href="/impressum">Impressum</a>
                <a href="/datenschutz">Datenschutz</a>
                <a href="/agb">AGB</a>
            </div>

            <p class="mt-2 flex justify-center">
                © {{ date('Y') }} Gruppe 1
            </p>

            </div>
        </footer>

        @livewireScripts
    </body>
</html>
