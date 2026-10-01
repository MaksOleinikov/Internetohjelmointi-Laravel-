<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="form bg-white p-6 border-1" action="{{ route('todo.update', [$todo->id]) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            
                            


                        </div>
                        <div class="md:w-1/3">
                            <x-label for="nimi" value="{{ _('Nimi') }}" />
                            <x-input id="nimi" class="block mt-l w-full" type="text" name="nimi" value="" require autofocus />

                            <x-label for="kuvaus" value="{{ _('Kuvaus') }}" />
                            <textarea name="kuvaus" id="kuvaus">{{ old('kuvaus') }}</textarea>
                            
                            <x-label for="status" value="{{ _('Status') }}" />
                            <select name="status" id="status">
                                <option value="idea">Idea</option>
                                <option value="toteutetaan">Toteutetaan</option>
                                <option value="aloitettu">Aloitettu</option>
                                <option value="tehty 50%">Tehty 50%</option>
                                <option value="tehty 70%">Tehty 70%</option>
                                <option value="valmis">Valmis</option>
                                <option value="hylätään ehdotus">Hylätään ehdotus</option>
                                <option value="tehdään seuraavaan versioon">Tehdään seuraavaan versioon</option>
                            </select>

                            <x-label for="määräpäivä" value="{{ _('Määräpäivä') }}" />
                            <input type="date" name="määräpäivä" id="määräpäivä" value="{{ old('määräpäivä') }}">

                            <x-label for="kiireellisyys" value="{{ _('kiireellisyys') }}" />
                            <select name="kiireellisyys" id="kiireellisyys">
                                    <option value="Ei kiirettä">Ei kiirettä</option>
                                    <option value="heti">Heti</option>
                                    <option value="eilen">Eilen</option>
                                </select>
                        </div>
                    </div>


                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            
                        </div>
                        <div class="md:w-1/3">
                            <button type="submit" class="btn btn-success">Päivitä todo</button>
                        </div>
                    </div>


                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
