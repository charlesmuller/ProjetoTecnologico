<x-layout title="Suas coleções" :mensagem-sucesso="$mensagemSucesso">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3">Criar Coleção</a>

           <ul class="list-group" style="margin-top: 20px;">
                    @foreach($colecoes as $colecao)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('comics.index', $colecao->id) }}" style="text-decoration: underline; color: blue">
                                {{$colecao->name_collection}}
                            </a>

                            <span class="d-flex">
                                <a href="{{ route('colecao.edit', $colecao->id) }} "
                                   class="btn btn-primary btn-sm" style="margin-top: 13px; position: relative; right: 4px; height: 37px; width: 50px; ">Ed</a>

                                <form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
                                    @csrf

                                    @method('DELETE')
                                    <button class="btn btn-danger btn-md" style="margin-top: 13px;"> Rm </button>
                                    <a href="{{ route('api.add') }}" class="btn btn-info btn-md" style="margin-top: 13px;"> Add </a>

                                                <button type="button" class="btn btn-default btn-lg">
                                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                                </button>
                                </form>

                            </span>
                        </li>
                    @endforeach
            </ul>
</x-layout>
