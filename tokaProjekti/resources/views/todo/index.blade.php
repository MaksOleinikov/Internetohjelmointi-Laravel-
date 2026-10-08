<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('todo.create') }}" class="btn btn-primary mb-3">Uusi todo</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Komennot</td>
                            <td>Nimi</td>
                            <td>Kuvaus</td>
                            <td>Status</td>
                            <td>Määräpäivä</td>
                            <td>Kiireellisyys</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                        <tr>
                            <td>
                                <a href="{{route('todo.show', [$todo->id])}}">katso</a>
                                <a href="{{route('todo.edit', [$todo->id])}}">muokka</a>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="post"
                                    style='display:inline'
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class='btn btn-danger btn-sm' onclick="return confirm('Haluatko varmasti poistaa?')">
                                    <img src="kuvat/trash.png" alt="Poista" width="20">
                                </button>

                                </form>
                            </td>
                            <td>
                                {{ $todo->nimi }}
                                </td>
                                <td>
                                {{ $todo->kuvaus }}
                                </td>
                                <td>
                                {{ $todo->status }}
                                </td>
                                <td>
                                {{ $todo->määräpäivä }}
                                </td>
                                <td>
                                {{ $todo->kiireellisyys }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
