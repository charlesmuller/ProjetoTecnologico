<x-layout title="Seus Quadrinhos" :mensagem-sucesso="$mensagemSucesso">
    <style>
        .container-01{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 62px;
            margin: 46px auto -54px auto;
            align-items: center;
            align-content: center;
        }
        .row-01{

            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
            background: #D9D9D9;
            color: #000000;
            padding: 0% 0% 12% 0%;
            margin: 8% 0% -9% 0%;
            border-width: 7px 7px 7px 7px;
            border-style: solid;
            width: 110%;
            -webkit-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            -moz-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            line-height: 120%;
        }
        .box-imagem-hq{
            max-width: 84%;
            border-width: 6px;
            margin: 3% 10% -19% 4%;
        }
        .box-imagem-hq img{
            width: 100%;
            display: block;
            transition: transform 0.5s;
        }
        .box-imagem-hq:hover img{
            transform: scale(2.5);
        }
        .box-titulo{
            display: flex;
            padding: 7% 25% 5% 43%;
            margin: -4% 15% -10% -40%;
            justify-content: left;
            border-bottom-width: 6px;
        }
        .box-personagem{
            display: flex;
            margin: 7% 77% 10% -4%;
            justify-content: left;
            padding: 3% 1% 4% 4%;
        }
        .box-grade-interna{
            display: grid;
            align-content: stretch;
            max-width: 105%;
            margin: 2% 0% -19% -7%;
            text-align: right;
            border-width: 6px;
        }
        .box-lido{

        }
        .box-botao-salvar{

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
        .info-titulo{
            margin-top: 0;
            margin-bottom: 1rem;
            margin-right: 6%;
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
                    <div class="box-imagem-hq">
                        <img src="{{$comic->images}}">
                    </div>
                    <div class="box-grade-interna">
                        <div class="box-titulo">
                            <p class="info-titulo">Titulo:</p>
                            <p>{{ $comic->title_comic }}</p>
                        </div>
                        <div class="box-personagem">
                            <p>Personagem: </p>
                            <p>{{ $comic->character_comic }}</p>
                        </div>
                        <div class="box-lido">
                            <p>Lido?</p>
                            <input type="checkbox" name="comics[]" value="{{ $comic->id }}" @if($comic->readed_comic) checked @endif />
                        </div>
                        <div class="box-botao-salvar">
                            <button class="btn btn-primary mt-2 mb-2">Salvar</button>
                        </div>
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


