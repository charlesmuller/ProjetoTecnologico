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
            font-size: 20px;
            margin-top: 3%;
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
        .aviso-sem-colecao{
            margin-top: 10%;
        }
        .box-sem-colecao{
            position: absolute;
            width: 845px;
            height: 0px;
            left: 537px;
            top: 512px;
            border: 1px solid #000000;
        }
        .box-dados-colecao1{
            margin-left: -23px
        }
        .box-dados-colecao2{
            margin-left: 82px
        }
        .box-dados-colecao3{
            margin-right: 58px
        }
    </style>
        <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3 botaoCriar">Criar Coleção</a>
    <ul class="list-group containerColecao">
        <li class="list-group-item d-flex justify-content-between align-items-center boxTitulos">
            <ul class="box-dados-colecao1">Id</ul> <ul class="box-dados-colecao2">Nome</ul> <ul class="box-dados-colecao3">Ações</ul>
        </li>

        @if(!empty($colecoesUsuario))
            @foreach($colecoes as $colecao)
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
                            <li>
                                <a href="{{ route('colecao.edit', $colecao->id) }} " class="btn btn-dark" style="font-size: 20px"> Editar Coleção </a>
                            </li>
                            <li>
                                <a href="{{ route('api.add', $colecao->id) }}" class="btn btn-info btn-md" style="margin-top: 13px; font-size: 20px"> Adicionar HQ </a>
                            </li>
                            @if($colecao->id)
                            <li style="margin-top: 11px;">
                                <a href="{{ route('colecao.show', $colecao->id) }} " class="btn btn-danger" style="font-size: 20px"> Remover Coleção </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endforeach
        @endif
            @empty($colecao)
                <div class="aviso-sem-colecao">
                    <p class="box-sem-colecao">Ainda não há coleções</p>
                </div>
            @endempty
    </ul>
</x-layout>
