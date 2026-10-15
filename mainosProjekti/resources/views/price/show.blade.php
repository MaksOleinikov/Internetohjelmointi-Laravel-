<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katso hinta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Kuva --}}
                @if ($price->image_path)
                    <img src="{{ asset('storage/' . $price->image_path) }}"
                         alt="{{ $price->kuvaus }}"
                         class="w-full h-80 object-cover"
                         onerror="this.replaceWith(Object.assign(document.createElement('div'),{className:'w-full h-80 bg-red-50 text-red-500 flex items-center justify-center text-sm',textContent:'Kuva ei lataudu'}))">
                @else
                    <div class="w-full h-80 bg-gray-100 text-gray-400 flex items-center justify-center">
                        Ei kuvaa
                    </div>
                @endif

                {{-- Tiedot --}}
                <div class="p-8">
                    <p class="text-sm uppercase tracking-wide text-gray-500">Hinta</p>
                    <p class="text-4xl font-bold text-gray-900 mt-1">{{ $price->price }}</p>

                    <p class="text-sm uppercase tracking-wide text-gray-500 mt-6">Kuvaus</p>
                    <p class="mt-1 text-lg text-gray-700 leading-relaxed">{{ $price->kuvaus }}</p>

                    <div class="mt-8 pt-6 border-t border-gray-200 text-sm text-gray-600">
                        Aamupala tarjoillaan joka päivä klo 7:00–11:00. Iltaisin vieraiden käytössä on
                        jääkaappi, mikroaaltouuni sekä kahvin- ja vedenkeitin.
                    </div>

                    {{-- Painikkeet --}}
                    <div class="mt-8 flex items-center gap-3">
                        <a href="{{ route('price.index') }}"
                           class="px-5 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition">
                            ← Takaisin
                        </a>
                        <a href="{{ route('price.edit', $price->id) }}"
                           class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">
                            Muokkaa
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>