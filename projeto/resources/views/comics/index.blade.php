<x-layout title="Seus Quadrinhos" :mensagem-sucesso="$mensagemSucesso">
    <style>
        .container-01{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 106px;
            margin: 73px 5% auto auto;
            align-content: center;
        }
        .row-01{
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
            background: #D9D9D9;
            color: #000000;
            margin: 0% 0% 0% 0%;
            border-width: 7px 7px 7px 7px;
            border-style: solid;
            width: 120%;
            -webkit-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            -moz-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            line-height: 120%;
            align-items: center;
        }
        .box-imagem-hq{
            max-width: 100%;
            border-width: 6px;
            margin: -9% 14% -9% 6%;
        }
        .box-imagem-hq img{
            width: 100%;
            display: block;
            transition: transform 0.5s;
        }
        .box-imagem-hq:hover img{
            transform: scale(1.7);
        }
        .box-titulo{
            display: flex;
            padding: 12%;
            margin: -11% 0% -8% 0%;
            justify-content: right;
            border-bottom-width: 6px;
        }
        .box-personagem{
            display: flex;
            margin: 9% 0% 0% 0%;
            justify-content: left;
            padding: 0% 0% 3% 1%;
            border-style: solid;
            border-bottom-width: 5px;
        }
        .box-grade-interna{
            display: grid;
            align-content: stretch;
            max-width: 107%;
            margin: 3% 0% 2% -10%;
            text-align: right;
            border-width: 6px;
        }
        .box-titulo-texto-interno{
            font-size: 16px;
            margin-right: 1%;
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .box-interno-titulo-2{
            font-size: 16px;
            margin-right: -8%;
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .box-interno-texto-personagem2{
            margin: 2% -19% 22% 9%;
            padding: 0% 0% 0% 0%;
        }
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
        .box-interno-nome-personagem2{
            font-size: 16px;
            margin: 2% 2% -3% 19%;
        }
        .box-botao-salvar{
            position: relative;
            margin: -26% 22% 0% -4%;
            left: -72px;
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
                            <p class="box-titulo-texto-interno">Titulo:</p>
                            <p class="box-interno-titulo-2">{{ $comic->title_comic }}</p>
                        </div>
                        <div class="box-personagem">
                            <p class="box-interno-texto-personagem2">Personagem:</p>
                            <p class="box-interno-nome-personagem2">{{ $comic->character_comic }}</p>
                        </div>
                        <div >
                            <p style="position: relative; left: -62px;">Lido?</p>
                            <label style="position: relative; left: -72px;">
                                <input type="checkbox" name="comics[]" value="{{ $comic->id }}" @if($comic->readed_comic) checked @endif />
                            </label>
                        </div>

                        <div class="box-botao-salvar">
                            <button class="btn btn-primary mt-2 mb-2" style="width: 31%; height: 55%; font-size: 12px; text-align: center;">Salvar</button>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty($comic)
                <div class="aviso-sem-hq">
                    <p class="box-sem-hq">Ainda não há quadrinhos</p>
                </div>
            @endempty
        </div>
    </form>
</x-layout>


