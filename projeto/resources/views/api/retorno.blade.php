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
        .card-title{
            display: flex;
            padding: 3%;
            margin: 9%;
            justify-content: right;
        }
        .card-personagem{
            display: flex;
            margin: 4% 54% 0% -4%;
            justify-content: left;
        }
        .card-imagem{
            float: right;
            max-width: 187px;
        }
        .grade-interna{
            max-width: 90%;
            margin-left: 0%;
            text-align: right;
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
{{--                {{dd($comic)}}--}}

                <form action="{{ route('api.store', $comic) }}" method="post">
                    @csrf
                    <div class="grade">
                        <div class="card-imagem" style="">
                            @if(!array_key_exists(0, $comic['images']))
                                <label>Sem imagem</label>
                            @else
                                <div>
                                    <img src="{{ $img = $comic['images'][0]['path']}}.jpg">
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



{{--<div class="container">--}}
{{--    @foreach($hqPersonagem as $comic)--}}
{{--        --}}{{--                {{dd($comic)}}--}}

{{--        <form action="{{ route('api.store', $comic) }}" method="post">--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="card-title">--}}
{{--                    <h2 style="font-size: 20px">{{$comic['title']}}</h2>--}}
{{--                    <input type='text' name='title' value="{{$comic['title']}}" hidden />--}}
{{--                </div>--}}
{{--                <div class="">--}}
{{--                    <h3 style="font-size: 20px">{{$comic['characters']['items'][0]['name']}}</h3>--}}
{{--                    <input type='text' name='title' value="{{$comic['characters']['items'][0]['name']}}" hidden />--}}
{{--                </div>--}}
{{--                <div class="card-imagem" style="float: right; max-width: 150px">--}}
{{--                    @if(!array_key_exists(0, $comic['images']))--}}
{{--                        <label>Sem imagem</label>--}}
{{--                    @else--}}
{{--                        <div>--}}
{{--                            <img src="{{ $img = $comic['images'][0]['path']}}.jpg">--}}
{{--                            <input type='text' name='images' value="{{$img}}" hidden/>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                </div>--}}
{{--                <div style="margin-top: 10px">--}}
{{--                    <button class="btn btn-success btn-md"> Adicionar </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    @endforeach--}}
{{--</div>--}}
