<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hinnasto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">Hinnat ja kuvaukset yhteensä: {{ $prices->count() }}</p>
                <a href="{{ route('price.create') }}"
                   class="px-5 py-2 bg-gray-800 text-white rounded-lg shadow hover:bg-gray-700 transition">
                    + Uusi hinta
                </a>
            </div>

            @if ($prices->isEmpty())
                <div class="bg-white rounded-lg shadow p-10 text-center text-gray-500">
                    Hintoja ei ole vielä lisätty.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($prices as $price)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                            {{-- Kuva --}}
                            @if ($price->image_path)
                                <img src="{{ asset('storage/' . $price->image_path) }}"
                                     alt="{{ $price->kuvaus }}"
                                     class="w-full h-48 object-cover"
                                     onerror="this.replaceWith(Object.assign(document.createElement('div'),{className:'w-full h-48 bg-red-50 text-red-500 flex items-center justify-center text-sm',textContent:'Kuva ei lataudu'}))">
                            @else
                                <div class="w-full h-48 bg-gray-100 text-gray-400 flex items-center justify-center text-sm">
                                    Ei kuvaa
                                </div>
                            @endif

                            {{-- Teksti --}}
                            <div class="p-5 flex-1">
                                <p class="text-2xl font-bold text-gray-900">{{ $price->price }}</p>
                                <p class="mt-2 text-gray-600">{{ $price->kuvaus }}</p>
                            </div>

                            {{-- Toiminnot --}}
                            <div class="px-5 py-3 bg-gray-50 border-t flex items-center gap-4 text-sm">
                                <a href="{{ route('price.show', $price->id) }}"
                                   class="text-gray-700 hover:underline">Katso</a>
                                <a href="{{ route('price.edit', $price->id) }}"
                                   class="text-blue-600 hover:underline">Muokkaa</a>

                                <form action="{{ route('price.destroy', $price->id) }}" method="post" class="ml-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Poista"
                                            onclick="return confirm('Haluatko varmasti poistaa?')">
                                        <img src="{{ asset('kuvat/trash.png') }}" alt="Poista" width="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>