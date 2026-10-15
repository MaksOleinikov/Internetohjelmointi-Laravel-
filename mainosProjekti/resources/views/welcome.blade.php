<x-layouts.public title="Matkakoti Lepää rauhassa">

    {{-- Pääkuva (vaihtuu vuodenajan mukaan) --}}
    <section class="relative h-[26rem] md:h-[32rem]">
        <img src="{{ asset("kuvat/{$season}1.jpg") }}" alt="Matkakoti Lepää rauhassa"
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-spruce-900/90 via-spruce-900/30 to-transparent"></div>
        <div class="relative h-full max-w-6xl mx-auto px-4 flex flex-col justify-end pb-10">
            <h1 class="font-display font-bold text-4xl md:text-6xl text-white max-w-2xl leading-tight">
                Pysähdy vanhalle maatilalle
            </h1>
            <p class="mt-3 text-xl text-white/90 max-w-xl">
                Matkakoti Lepää rauhassa tarjoaa rauhallista yöpymistä 20 huoneessa.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#hinnasto"
                   class="px-6 py-3 rounded-md bg-ochre-600 text-white font-semibold hover:bg-ochre-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                    Katso hinnasto
                </a>
                <a href="{{ route('feedback.create') }}"
                   class="px-6 py-3 rounded-md border border-white/70 text-white hover:bg-white/10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                    Anna palautetta
                </a>
            </div>
        </div>
    </section>

    {{-- Perustiedot --}}
    <section class="bg-white border-b border-birch">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 md:divide-x divide-birch">
            <div class="py-6 md:pr-8">
                <p class="font-display font-bold text-lg">20 huonetta</p>
                <p class="text-spruce-700">Viidessä oma vessa, muissa yhteinen vessa.</p>
            </div>
            <div class="py-6 md:px-8 border-t md:border-t-0 border-birch">
                <p class="font-display font-bold text-lg">Aamupala klo 7:00–11:00</p>
                <p class="text-spruce-700">Joka päivä, keittiön vieressä.</p>
            </div>
            <div class="py-6 md:pl-8 border-t md:border-t-0 border-birch">
                <p class="font-display font-bold text-lg">Iltaisin omatoimisesti</p>
                <p class="text-spruce-700">Jääkaappi, mikro sekä kahvin- ja vedenkeitin.</p>
            </div>
        </div>
    </section>

    {{-- Esittely --}}
    <section class="max-w-6xl mx-auto px-4 mt-16 grid gap-10 md:grid-cols-2 items-center">
        <img src="{{ asset("kuvat/{$season}2.jpg") }}" alt="Maatilan pihapiiri"
             class="w-full h-80 object-cover rounded-md">
        <div class="max-w-prose">
            <h2 class="font-display font-bold text-3xl">Rauhaa maaseudulla</h2>
            <p class="mt-4 text-lg leading-relaxed">
                Matkakotimme sijaitsee vanhalla maatilalla, jossa voit pysähtyä, levätä ja
                nauttia maaseudun rauhasta. Huoneet sopivat yhden yön pysähdykseen matkan
                varrella sekä pidempään lepäämiseen.
            </p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 mt-16 grid gap-10 md:grid-cols-2 items-center">
        <div class="max-w-prose md:order-1">
            <h2 class="font-display font-bold text-3xl">Aamupala ja iltaisin</h2>
            <p class="mt-4 text-lg leading-relaxed">
                Aamupalaa tarjoillaan joka päivä klo 7:00–11:00 matkakodin isossa huoneessa
                keittiön vieressä. Iltaisin ruokaa ei tarjoilla, mutta samassa tilassa on
                vieraiden käytössä jääkaappi, mikroaaltouuni sekä kahvin- ja vedenkeitin.
            </p>
        </div>
        <img src="{{ asset("kuvat/{$season}3.jpg") }}" alt="Aamupalatila"
             class="w-full h-80 object-cover rounded-md md:order-2">
    </section>

    {{-- Hinnasto --}}
    <section id="hinnasto" class="max-w-6xl mx-auto px-4 mt-20 scroll-mt-24">
        <h2 class="font-display font-bold text-3xl">Hinnasto</h2>
        <p class="mt-2 text-lg text-spruce-700">Valitse sinulle sopiva huone.</p>

        @if ($prices->isEmpty())
            <p class="mt-8 py-10 text-center text-spruce-700 bg-white border border-birch rounded-md">
                Hintoja ei ole vielä lisätty.
            </p>
        @else
            <ul class="mt-8 bg-white border border-birch rounded-md divide-y divide-birch">
                @foreach ($prices as $price)
                    <li class="p-4 md:p-5 flex flex-col sm:flex-row gap-4 sm:items-center">
                        @if ($price->image_path)
                            <img src="{{ asset('storage/' . $price->image_path) }}" alt="{{ $price->kuvaus }}"
                                 class="w-full sm:w-44 h-40 sm:h-28 object-cover rounded">
                        @else
                            <div class="w-full sm:w-44 h-40 sm:h-28 rounded bg-snow border border-birch flex items-center justify-center text-spruce-700 text-sm">
                                Ei kuvaa
                            </div>
                        @endif

                        <p class="flex-1 text-lg leading-snug max-w-prose">{{ $price->kuvaus }}</p>

                        <div class="sm:text-right">
                            <p class="font-display font-bold text-2xl text-ochre-700">{{ $price->price }}</p>
                            @auth
                                <a href="{{ route('price.edit', $price->id) }}"
                                   class="text-sm text-spruce-700 underline">Muokkaa</a>
                            @endauth
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    {{-- Palaute --}}
    <section class="max-w-6xl mx-auto px-4 mt-20">
        <div class="bg-spruce-800 text-white rounded-md p-8 md:p-10 flex flex-col md:flex-row md:items-center gap-6 justify-between">
            <div>
                <h2 class="font-display font-bold text-2xl">Kerro, miten viihdyit</h2>
                <p class="mt-2 text-spruce-100">Palaute sivuista, majoituksesta tai muista ajankohtaisista asioista on tervetullutta.</p>
            </div>
            <a href="{{ route('feedback.create') }}"
               class="shrink-0 px-6 py-3 rounded-md bg-ochre-600 font-semibold hover:bg-ochre-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Anna palautetta
            </a>
        </div>
    </section>

</x-layouts.public>
