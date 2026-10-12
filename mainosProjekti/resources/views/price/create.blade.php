<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uusi hinta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6 max-w-xl space-y-4" action="{{ route('price.store') }}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-label for="price" value="Hinta" />
                        <x-input id="price" class="block mt-1 w-full" type="text" name="price"
                                 :value="old('price')" required autofocus />
                        <x-input-error for="price" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="kuvaus" value="Kuvaus" />
                        <x-input id="kuvaus" class="block mt-1 w-full" type="text" name="kuvaus"
                                 :value="old('kuvaus')" required />
                        <x-input-error for="kuvaus" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="image" value="Kuva" />
                        <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*">
                        <x-input-error for="image" class="mt-2" />
                    </div>

                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded">
                        Lisää uusi hinta
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>