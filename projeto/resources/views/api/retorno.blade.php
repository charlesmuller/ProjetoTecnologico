<x-layout title="Retorno da pesquisa">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="col-lg-12">
    <a href="/api/adicionarhq" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
</div>
    <body>
    {{dd($hqPersonagem)}}
    @foreach($hqPersonagem as $comic)
{{--        {{dd($comic)}}--}}
    <div>
        {{ $comic['title'] }}
    </div>
        <div>
            <figure>
                <img src="{{$comic['images'][0]['path']}}.jpg">
            </figure>
        </div>
    @endforeach
    </body>

</x-layout>
