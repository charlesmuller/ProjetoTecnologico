<x-layout title="Sua coleção">

    <a href="{{ route('colecao.create') }}" class="btn btn-dark mb-3">Adicionar</a>
    <div>
        <ul class="list-group" style="margin-top: 20px;">
            @foreach($quadrinhos as $quadrinho)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$quadrinho->name_collection}}

                    <form action="{{ route('colecao.destroy', $quadrinho -> id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-md" style="margin-top: 13px;"> REMOVER </button>

                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
