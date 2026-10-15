<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Muokkaa palautetta</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8">
                <form action="{{ route('feedback.update', $feedback->id) }}" method="post" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="name" value="Nimi" />
                        <x-input id="name" type="text" name="name" class="block mt-1 w-full"
                                 :value="old('name', $feedback->name)" required />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="email" value="Sähköposti" />
                        <x-input id="email" type="email" name="email" class="block mt-1 w-full"
                                 :value="old('email', $feedback->email)" />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="category" value="Aihe" />
                        <select id="category" name="category"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            @foreach (['sivusto' => 'Sivusto', 'majoitus' => 'Majoitus', 'ajankohtaista' => 'Muu ajankohtainen asia'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('category', $feedback->category) === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="category" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="message" value="Palaute" />
                        <textarea id="message" name="message" rows="6"
                                  class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('message', $feedback->message) }}</textarea>
                        <x-input-error for="message" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('feedback.index') }}"
                           class="px-5 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">Peruuta</a>
                        <button type="submit" class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                            Päivitä
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>