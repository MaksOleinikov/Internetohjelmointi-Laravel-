<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display font-bold text-xl text-spruce-900 leading-tight">
            Hallinta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-birch sm:rounded-lg p-8">
                <p class="text-lg text-spruce-900">Tervetuloa, {{ Auth::user()->name }}. Täältä voit hallita sivuston sisältöä.</p>

                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <a href="{{ route('price.index') }}" class="block p-5 border border-birch rounded-md hover:border-spruce-700">
                        <p class="font-display font-bold text-lg">Hinnasto</p>
                        <p class="text-spruce-700">Lisää, muokkaa ja poista hintoja ja kuvia.</p>
                    </a>
                    <a href="{{ route('feedback.index') }}" class="block p-5 border border-birch rounded-md hover:border-spruce-700">
                        <p class="font-display font-bold text-lg">Palautteet</p>
                        <p class="text-spruce-700">Lue ja hallitse vieraiden palautteita.</p>
                    </a>
                    <a href="{{ route('home') }}" class="block p-5 border border-birch rounded-md hover:border-spruce-700">
                        <p class="font-display font-bold text-lg">Näytä sivusto</p>
                        <p class="text-spruce-700">Avaa julkinen etusivu.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
