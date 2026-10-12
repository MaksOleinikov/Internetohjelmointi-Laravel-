<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katso hinta') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <x-label for="price" value="{{ __('Price') }}" />
                            <x-label for="kuvaus" value="{{ __('Kuvaus') }}" />
                        </div>

                        <div class="md:w-1/3">

                            <div>
                            {{ $price->price }}
                            </div>
                            
                            <div>
                            {{ $price->kuvaus }}
                            </div>
                        
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>