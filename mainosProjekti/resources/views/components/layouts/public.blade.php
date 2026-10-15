<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Matkakoti Lepää rauhassa' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bitter:600,700|source-sans-3:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-snow text-spruce-900 flex min-h-screen flex-col">

    {{-- Valikko --}}
    <header x-data="{ open: false }" class="sticky top-0 z-30 bg-white border-b border-birch">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display font-bold text-xl text-spruce-800">
                Lepää rauhassa
            </a>

            <nav class="hidden md:flex items-center gap-8 text-lg">
                <a href="{{ route('home') }}" class="hover:text-ochre-700 {{ request()->routeIs('home') ? 'font-semibold' : '' }}">Etusivu</a>
                <a href="{{ route('home') }}#hinnasto" class="hover:text-ochre-700">Hinnasto</a>
                <a href="{{ route('feedback.create') }}" class="hover:text-ochre-700 {{ request()->routeIs('feedback.create') ? 'font-semibold' : '' }}">Palaute</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-1.5 rounded-md border border-spruce-800 hover:bg-spruce-800 hover:text-white">Hallinta</a>
                @else
                    <a href="{{ route('login') }}" class="text-spruce-700 hover:text-ochre-700">Kirjaudu</a>
                @endauth
            </nav>

            <button @click="open = !open" type="button"
                    class="md:hidden p-2 rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-spruce-700"
                    aria-label="Avaa valikko" :aria-expanded="open">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                    <path x-show="open" x-cloak stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>
        </div>

        <nav x-show="open" x-cloak class="md:hidden border-t border-birch px-4 py-3 text-lg space-y-3">
            <a href="{{ route('home') }}" class="block">Etusivu</a>
            <a href="{{ route('home') }}#hinnasto" class="block">Hinnasto</a>
            <a href="{{ route('feedback.create') }}" class="block">Palaute</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block font-semibold">Hallinta</a>
            @else
                <a href="{{ route('login') }}" class="block">Kirjaudu</a>
            @endauth
        </nav>
    </header>

    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Alapalkki --}}
    <footer class="bg-spruce-900 text-spruce-100 mt-20">
        <div class="max-w-6xl mx-auto px-4 py-10 grid gap-8 md:grid-cols-3">
            <div>
                <p class="font-display font-bold text-xl text-white">Matkakoti Lepää rauhassa</p>
                <p class="mt-2">Majoitusta vanhalla maatilalla, 20 huonetta.</p>
            </div>
            <div>
                <p class="font-semibold text-white">Aamupala</p>
                <p class="mt-2">Joka päivä klo 7:00–11:00 isossa huoneessa keittiön vieressä.</p>
            </div>
            <div>
                <p class="font-semibold text-white">Iltaisin</p>
                <p class="mt-2">Jääkaappi, mikroaaltouuni sekä kahvin- ja vedenkeitin vieraiden käytössä.</p>
            </div>
        </div>
        <div class="border-t border-spruce-700">
            <p class="max-w-6xl mx-auto px-4 py-4 text-sm text-spruce-100/80">
                © {{ date('Y') }} Matkakoti Lepää rauhassa Oy
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
