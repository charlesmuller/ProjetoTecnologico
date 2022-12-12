<x-layout title="Seus Quadrinhos" :mensagem-sucesso="$mensagemSucesso">
    <style>
        .container-01{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 45px;
            margin: 50px auto 0px auto;
            align-items: stretch;
            flex-direction: column;
            align-content: center;
        }
        .row-01{
            justify-content: center;
            background: #D9D9D9;
            color: #000000;
            padding: 10px;
            margin-bottom: 5px;
            border-width: 4px 4px 4px 4px;
            border-style: solid;
            align-items: center;
            flex-direction: column;
            width: 400px;
            box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            -webkit-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            -moz-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
        }
        .aviso-sem-hq{
            margin-top: 10%;
        }
        .box-sem-hq{
            position: absolute;
            width: 1120.01px;
            height: 0px;
            left: 398px;
            top: 512px;
            border: 1px solid #000000;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div>
        <a href="/colecao" class="btn btn-dark" style="position: absolute; right: 80%; top: 12%;">Voltar</a>
    </div>
    <form method="post">
        @csrf
        <div class="container-01">
            @foreach($comics as $comic)
                <div class="row-01">
                    <div>{{ $comic->title_comic }}</div>
                    <div>{{ $comic->character_comic }}</div>
                    <div><img src="{{$comic->images}}"></div>

                    <div>
                        Lido?
                        <input type="checkbox" name="comics[]" value="{{ $comic->id }}" @if($comic->readed_comic) checked @endif />
                    </div>
                    <div>
                        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
                    </div>
                </div>
                    {{--para enviar a informação ao comicsController com o check do quadrinho lido--}}
            @endforeach
            @empty($comic)
                <div class="aviso-sem-hq">
                    <p class="box-sem-hq">Ainda não há quadrinhos</p>
                </div>
            @endempty
        </div>
    </form>
</x-layout>


