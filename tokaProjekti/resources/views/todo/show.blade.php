<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <x-label for="nimi" value="{{ _('Nimi') }}" />
                            <x-label for="kuvaus" value="{{ _('Kuvaus') }}" />
                            <x-label for="status" value="{{ _('Status') }}" />
                            <x-label for="määräpäivä" value="{{ _('Määräpäivä') }}" />
                            <x-label for="kiireellisyys" value="{{ _('Kiireellisyys') }}" />


                        </div>
                        <div class="md:w-1/3"> 
                            <div>
                            {{ $todo->nimi }}
                            <div></div>
                            {{ $todo->kuvaus }}
                            <div></div>
                            {{ $todo->status }}
                            <div></div>
                            {{ $todo->määräpäivä }}
                            <div></div>
                            {{ $todo->kiireellisyys }}
                            </div>
                        </div>
                    </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
