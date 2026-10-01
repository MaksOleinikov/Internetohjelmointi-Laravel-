<div class="p-6 lg:p-8 bg-white border-b border-gray-200">


    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Jätä tänne palaute
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
      Täällä on palautteita
    </p>
    <p>
        <a href="{{ route('palaute.create')}}">Create</a>


        
        CRUD
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <table class="table table-bordered">
            <thead>
                <tr class="border border-green-600 bg-red-200">
                    <th>id</th>
                    <th>nimi</th>
                    <th>teksti</th>
                    <th>luotu</th>
                    <th>päivitetty</th>
                    <th>toiminnot</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($palaute as $item)
                <tr class="border border-lime-500 border-dashed">
                    <td class="pl-3 pr-3"> {{ $item->id }} </td>
                    <td class="pl-3 pr-3"> {{ $item->nimi }} </td>
                    <td class="pl-3 pr-3"> {{ $item->teksti }} </td>
                    <td class="pl-3 pr-3"> {{ $item->created_at->format('d.m.Y') }} </td>
                    <td class="pl-3 pr-3"> {{ $item->updated_at->format('d.m.Y') }} </td>
                    <td class="bg-gray-300 pl-3 pr-3">
                        <a href="{{ route('palaute.edit', [$item->id]) }}">Muokka</a> 
                        /
                        <form action="{{ route('palaute.destroy', $item->id) }}" method="POST" style="display:inline"
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Poista</button>
</form>
                </tr>
            @endforeach
        </tbody>
        </table>

    </div>
    
      
</div>
