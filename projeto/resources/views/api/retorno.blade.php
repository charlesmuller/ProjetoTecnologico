<x-layout title="Retorno da pesquisa ">
    <style>
        .container-principal{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 62px;
            margin: 46px auto -54px auto;
            align-items: center;
            align-content: center;
        }
        .grade{
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
            background: #D9D9D9;
            color: #000000;
            padding: 0%;
            margin-bottom: 6%;
            border-width: 7px 7px 7px 7px;
            border-style: solid;
            width: 110%;
            -webkit-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            -moz-box-shadow: 0px 0px 19px 7px rgba(0,0,0,0.62);
            line-height: 120%;
        }
        .card-imagem{
            max-width: 84%;
            border-width: 6px;
            margin: 3% 12% 6% 4%;
        }
        .box-container-imagem img{
            width: 100%;
            display: block;
            transition: transform 0.5s;
        }
        .box-container-imagem:hover img{
            transform: scale(2.5);
        }
        .card-title{
            display: flex;
            padding: 15%;
            margin: -1%;
            justify-content: right;
            border-bottom-width: 6px;
        }
        .card-personagem{
            display: flex;
            margin: 7% 77% 10% -4%;
            justify-content: left;
            padding: 3% 1% 4% 4%;
        }
        .grade-interna{
            display: grid;
            align-content: stretch;
            max-width: 105%;
            margin: 2% 0% -19% -7%;
            text-align: right;
            border-width: 6px;
        }
        .box-interno-texto-titulo{
            font-size: 16px;
            margin-top: 0%;
            margin-left: -18%;
            margin-bottom: 1rem;
        }
        .box-interno-titulo{
            font-size: 16px;
            margin-right: -8%;
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .box-interno-texto-personagem{
            margin: 1% 11% 2rem 6%;
            padding: 0% 0% 0% 0%;
        }
        .box-interno-nome-personagem{
            font-size: 16px;
            margin: 0% -50% -21% 19%;
        }

    </style>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div>
        <a href="/api/adicionarhq" class="btn btn-dark" style="position: absolute; top: 12%; left: 16%;">Voltar</a>
    </div>
        <div class="container-principal">
            @foreach($hqPersonagem as $comic)
                <form action="{{ route('api.store', $comic) }}" method="post">
                    @csrf
                    <div class="grade">
                        <div class="card-imagem" style="">
                            @if(!array_key_exists(0, $comic['images']))
                                <label>Sem imagem</label>
                            @else
                                <div class="box-container-imagem">
                                    <img src="{{ $img = $comic['images'][0]['path','extension']}}.jpg">
                                    <input type='text' name='images' value="{{$img}}" hidden/>
                                </div>
                            @endif
                        </div>
                        <div class="grade-interna">
                            <div class="card-title">
                                <p class="box-interno-texto-titulo">Titulo:</p>
                                <p class="box-interno-titulo">{{$comic['title']}}</p>
                                <input type='text' name='title' value="{{$comic['title']}}" hidden />
                            </div>
                            <div class="card-personagem">
                                <p class="box-interno-texto-personagem">Personagem:</p>
                                <p class="box-interno-nome-personagem">{{$comic['characters']['items'][0]['name']}}</p>
                                <input type='text' name='title' value="{{$comic['characters']['items'][0]['name']}}" hidden />
                            </div>
                        </div>
                        <div style="margin-top: 10px">
                            <button class="btn btn-success btn-md"> Adicionar </button>
                        </div>
                    </div>
                </form>
           @endforeach
        </div>
</x-layout>
