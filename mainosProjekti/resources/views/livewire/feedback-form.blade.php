<div>
    @if ($sent)
        <div class="mb-6 p-4 bg-spruce-50 border border-spruce-100 text-spruce-800 rounded-md">
            Kiitos palautteesta! Viesti on vastaanotettu.
        </div>
    @endif

    <form wire:submit="save" class="space-y-5">
        <div>
            <x-label for="name" value="Nimi" />
            <x-input id="name" type="text" wire:model="name" class="block mt-1 w-full" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div>
            <x-label for="email" value="Sähköposti (vapaaehtoinen)" />
            <x-input id="email" type="email" wire:model="email" class="block mt-1 w-full" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div>
            <x-label for="category" value="Palautteen aihe" />
            <select id="category" wire:model="category"
                    class="block mt-1 w-full border-gray-300 focus:border-spruce-700 focus:ring-spruce-700 rounded-md shadow-sm">
                <option value="sivusto">Sivusto</option>
                <option value="majoitus">Majoitus</option>
                <option value="ajankohtaista">Muu ajankohtainen asia</option>
            </select>
            <x-input-error for="category" class="mt-2" />
        </div>

        <div>
            <x-label for="message" value="Palaute" />
            <textarea id="message" wire:model="message" rows="6"
                      class="block mt-1 w-full border-gray-300 focus:border-spruce-700 focus:ring-spruce-700 rounded-md shadow-sm"></textarea>
            <x-input-error for="message" class="mt-2" />
        </div>

        <button type="submit" class="px-6 py-3 rounded-md bg-ochre-600 text-white font-semibold hover:bg-ochre-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ochre-700">
            Lähetä palaute
        </button>
    </form>
</div>