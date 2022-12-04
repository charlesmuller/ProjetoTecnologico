<x-layout title="Suas coleções" :mensagem-sucesso="$mensagemSucesso">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); border-radius: 5px;">Criar Coleção</a>

    <ul class="list-group" style="margin-top: 20px;">
        @foreach($colecoes as $colecao)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$colecao->name_collection}}
                <div class="btn-group" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); border-radius: 5px;">
                    <button type="button" class="btn btn-primary"><a href="{{ route('comics.index', $colecao->id) }}"
                        style="color: white; text-decoration: none;"> Ver Coleção </a>
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('colecao.edit', $colecao->id) }} " class="btn btn-dark"> Editar Coleção </a></li>
                        <li><form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-md" style="margin-top: 13px;"> Remover Coleção </button>
                            </form></li>
                        <li><a href="{{ route('api.add') }}" class="btn btn-info btn-md" style="margin-top: 13px;"> Adicionar Quadrinho </a></li>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
