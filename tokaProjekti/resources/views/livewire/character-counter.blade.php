<div>
    <textarea
        wire:model.live="text" name="kuvaus" id="kuvaus" rows="4"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        placeholder="Kirjoita tehtävän kuvaus tähän"
    ></textarea>

    <div class="mt-2 flex items-center justify-between text-sm">
        <div>
            <span class="@if($this->isOverLimit) text-red-600 font-semibold @else text-gray-600 @endif">
                {{ $this->characterCount }} / {{ $maxLength }}
            </span>
            <span class="text-gray-500 ml-1">Merkkiä</span>
        </div>

        <div>
            @if ($this->isOverLimit)
                <span class="text-red-600 font-semibold">
                    {{ abs($this->remaining) }} merkkiä liikaa!
                </span>
            @elseif($this->remaining < 60)
                <span class="text-yellow-600">
                    {{ $this->remaining }} merkkiä jäljellä
                </span>
            @else
                <span class="text-green-600">
                    {{ $this->remaining }} merkkiä jäljellä
                </span>
            @endif
        </div>
    </div>

    <div class="mt-2 w-full bg-gray-200 rounded-full h-2">
        <div class="h-2 rounded-full transition-all duration-300
            @if($this->isOverLimit) bg-red-500
            @elseif($this->characterCount > $maxLength * 0.9) bg-yellow-500
            @else bg-green-500
            @endif
        "></div>
    </div>
</div>