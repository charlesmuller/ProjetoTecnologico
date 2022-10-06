<x-layout title="Sua coleção">
    <a href="{{ route('colecao.create') }}" class="btn btn-dark mb-3">Adicionar</a>
    <ul class="list-group">
        @foreach($quadrinhos as $quadrinho)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$quadrinho->name_collection}}

                <form action="{{ route('colecao.destroy', $quadrinho -> id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"> REMOVER </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
