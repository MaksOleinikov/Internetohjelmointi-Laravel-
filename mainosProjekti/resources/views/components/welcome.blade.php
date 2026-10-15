<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="text-3xl font-bold text-gray-900">
        Tervetuloa Matkakoti Lepää rauhassa
    </h1>
    <p class="mt-2 text-lg text-gray-600">Rauhallista yöpymistä vanhalla maatilalla</p>
</div>

<div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8 space-y-8 lg:space-y-12">

    {{-- Rivi 1 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-center">
        <img src="{{ asset('kuvat/autumn1.jpg') }}" alt="Syksyinen maatila"
             class="w-full h-72 object-cover rounded-lg shadow">
        <p class="text-gray-800 leading-relaxed text-lg">
            Matkakotimme sijaitsee vanhalla maatilalla, jossa voit pysähtyä, levätä ja
            nauttia maaseudun rauhasta. Majoitamme vieraita 20 huoneessa. Viidessä
            huoneessa on oma vessa, ja muissa huoneissa on käytössä yhteinen vessa.
        </p>
    </div>

    {{-- Rivi 2 (kuva oikealla) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-center">
        <img src="{{ asset('kuvat/autumn2.jpg') }}" alt="Maatilan pihapiiri"
             class="w-full h-72 object-cover rounded-lg shadow md:order-2">
        <p class="text-gray-800 leading-relaxed text-lg md:order-1">
            Aamupalaa tarjoillaan joka päivä klo 7:00–11:00 matkakodin isossa huoneessa
            keittiön vieressä. Iltaisin ruokaa ei tarjoilla, mutta samassa tilassa on
            vieraiden käytössä jääkaappi, mikroaaltouuni sekä kahvin- ja vedenkeitin.
        </p>
    </div>

    {{-- Rivi 3 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-center">
        <img src="{{ asset('kuvat/autumn3.jpg') }}" alt="Ruskan värejä"
             class="w-full h-72 object-cover rounded-lg shadow">
        <p class="text-gray-800 leading-relaxed text-lg">
            Syksyllä maatilan pihapiiri hehkuu ruskan väreissä. Tule nauttimaan
            tunnelmasta itse.
        </p>
    </div>

</div>