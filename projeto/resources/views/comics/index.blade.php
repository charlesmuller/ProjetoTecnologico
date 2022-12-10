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
                    <div><img src="{{$comic->img_data}}"></div>

                    <div>
                        Lido?
                        <input type="checkbox" name="comics[]" value="{{ $comic->id }}" @if($comic->readed_comic) checked @endif />
                    </div>
                    <div>
                        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
                    </div>
                </div>
                    {{--                para enviar a informação ao comicsController com o check do quadrinho lido--}}
            @endforeach
        </div>
    </form>
</x-layout>
{{--        <ul class="list-group" style="margin-top: 20px;">--}}
{{--            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #DCDCDC; padding-left: 0">--}}
{{--                <ul>Edicão</ul><ul>Título</ul><ul>Personagem</ul><ul>Lido?</ul>--}}
{{--            </li>--}}

{{--            @foreach($comics as $comic)--}}
{{--                <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                    <ul>{{ $comic->title_comic }}</ul>--}}
{{--                    <ul>{{ $comic->character_comic }}</ul>--}}
{{--                    <ul>{{$comic->img_data}}</ul>--}}
{{--                    <input--}}
{{--                        type="checkbox"--}}
{{--                        name="comics[]"--}}
{{--                        value="{{ $comic->id }}"--}}
{{--                        @if($comic->readed_comic) checked @endif />--}}
{{--    --}}{{--                para enviar a informação ao comicsController com o check do quadrinho lido--}}

{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}


