<x-layout title="Retorno da pesquisa">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .container{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            /*grid-template-rows: 1fr 1fr 1fr;*/
            grid-gap: 45px;
            margin: 50px auto 0px auto;
            align-items: center;
            flex-direction: column;
        }

        .row{
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
        .card-title{
            display: flex;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            justify-content: center;
        }

    </style>
    <div class="col-lg-4">
        <a href="/api/adicionarhq" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
    </div>
    <body>
        <div class="container">
            {{--    {{dd($hqPersonagem)}}--}}
            @foreach($hqPersonagem as $comic)
            {{--        {{dd($comic)}}--}}
                <form action="{{ route('api.store', $comic['title'], $comic['images']) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="card-title">
                        <h2 style="font-size: 20px">{{$comic['title']}}</h2>
            {{--            {{dd($title)}}--}}
                        <input type='text' name='title' value={{$comic['title']}} hidden />
                        </div>

                        <div class="card-imagem" style="float: right; max-width: 150px">
                            @if(!array_key_exists(0, $comic['images']))
                                <label>Sem imagem</label>
                            @else
                                <div>
                                    <img src="{{ $img = $comic['images'][0]['path']}}.jpg">
                                    <input type='text' name='images' value={{$img}} hidden/>
                                </div>
                            @endif

                        </div>
                        <div style="margin-top: 10px">
                            <button class="btn btn-success btn-md"> Adicionar </button>
                        </div>
                    </div>
                </form>
           @endforeach
        </div>
    </body>

</x-layout>
