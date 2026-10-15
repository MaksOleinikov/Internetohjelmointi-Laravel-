<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Palautteet</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
            @endif

            @forelse ($feedbacks as $feedback)
                <div class="bg-white rounded-lg shadow p-5 mb-4">
                    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                        <span class="px-2 py-1 bg-gray-100 rounded">{{ $feedback->category }}</span>
                        <span class="font-semibold text-gray-800">{{ $feedback->name }}</span>
                        @if ($feedback->email) <span>{{ $feedback->email }}</span> @endif
                        <span class="ml-auto">{{ $feedback->created_at->format('d.m.Y H:i') }}</span>
                    </div>

                    <p class="mt-3 text-gray-700">{{ \Illuminate\Support\Str::limit($feedback->message, 160) }}</p>

                    <div class="mt-3 flex items-center gap-4 text-sm">
                        <a href="{{ route('feedback.show', $feedback->id) }}" class="hover:underline">Katso</a>
                        <a href="{{ route('feedback.edit', $feedback->id) }}" class="text-blue-600 hover:underline">Muokkaa</a>
                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Haluatko varmasti poistaa?')">Poista</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow p-10 text-center text-gray-500">
                    Palautteita ei ole vielä tullut.
                </div>
            @endforelse

            {{ $feedbacks->links() }}
        </div>
    </div>
</x-app-layout>