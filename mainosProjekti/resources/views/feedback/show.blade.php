<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Katso palaute</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8">
                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                    <span class="px-2 py-1 bg-gray-100 rounded">{{ $feedback->category }}</span>
                    <span class="ml-auto">{{ $feedback->created_at->format('d.m.Y H:i') }}</span>
                </div>

                <p class="mt-4 text-xl font-semibold text-gray-900">{{ $feedback->name }}</p>
                @if ($feedback->email)
                    <p class="text-gray-600">{{ $feedback->email }}</p>
                @endif

                <p class="mt-6 text-gray-700 leading-relaxed whitespace-pre-line">{{ $feedback->message }}</p>

                <div class="mt-8 flex items-center gap-3">
                    <a href="{{ route('feedback.index') }}"
                       class="px-5 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">← Takaisin</a>
                    <a href="{{ route('feedback.edit', $feedback->id) }}"
                       class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Muokkaa</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>