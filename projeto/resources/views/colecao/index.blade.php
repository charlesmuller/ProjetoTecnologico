<x-layout title="Suas coleções" :mensagem-sucesso="$mensagemSucesso">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .containerColecao{
            width: 848px;
            margin: 20px auto;
        }
        .botaoCriar{
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            font-size: 20px
        }
        .boxTitulos{
            border: 5px solid rgba(0, 0, 0, .025);
            font-size: 20px;
            background-color: #d9d9d9
        }
        .boxDadosColecao{
            border: 5px solid rgba(0, 0, 0, .125);
            font-size: 25px
        }
        .botaoDown {
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
    </style>
        <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3 botaoCriar">Criar Coleção</a>
    <ul class="list-group containerColecao">
        @foreach($colecoes as $colecao)
            <li class="list-group-item d-flex justify-content-between align-items-center boxTitulos">
                <ul style="margin-left: -23px">Id</ul> <ul style="margin-left: 82px">Nome</ul> <ul style="margin-right: 58px">Ações</ul>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center boxDadosColecao" style="">
                <div>{{$colecao->id}}</div>
                <div style="margin-right: -126px;">{{$colecao->name_collection}}</div>

                <div class="btn-group botaoDown">
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('comics.index', $colecao->id) }}" style="color: white; text-decoration: none; font-size: 20px">Ver Coleção</a>
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('colecao.edit', $colecao->id) }} " class="btn btn-dark" style="font-size: 20px"> Editar Coleção </a></li>
                        <li><form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-md" style="margin-top: 13px;font-size: 20px"> Remover Coleção </button>
                            </form></li>
                        <li><a href="{{ route('api.add', $colecao->id) }}" class="btn btn-info btn-md" style="margin-top: 13px; font-size: 20px"> Adicionar Quadrinho </a></li>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
