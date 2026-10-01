<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Kirjoita uuden palautteen tiedot
    </h1>

</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <form method="POST" action="{{ route('palaute.store')}}">
            <div>
                <x-label for="nimi" value="{{ __('Nimi')}}"/>
                <x-input id="nimi" class="block mt-1 w-full" type="text" name="nimi" :value="old('nimi')" required autofocus autocomplete="nimi"/>



                </div>

                <div>
                    <x-label for="teksti" value="{{ __('Teksti')}}"/>
                    <x-input id="teksti" class="block mt-1 w-full" type="text" name="teksti" :value="old('teksti')" required autofocus autocomplete="name"/>
                </div>
                <div>
                    <input type="submit" value="Tallenna tiedot">
                </div>
            </form>
    </div>
   
      
</div>
