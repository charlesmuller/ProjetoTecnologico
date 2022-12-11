<x-layout title="Excluir Coleção '{!! $colecao->name_collection !!}'">
    <a href="/colecao" class="btn btn-dark" style="position: absolute; right: 80%; top: 12%;">Voltar</a>

    <li>
        <form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-md" style="margin-top: 13px;font-size: 20px"> Remover Coleção </button>
        </form>
    </li>
</x-layout>
