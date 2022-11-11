<x-layout title="Seus Quadrinhos">
    <div><a href="/colecao" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a></div>

    <ul class="list-group" style="margin-top: 20px;">
        @foreach($comics as $comic)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$comic->id}}

                <span class="badge bg-secondary">
                    {{ $comics->id }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
