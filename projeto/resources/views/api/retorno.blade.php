<x-layout title="Retorno da pesquisa">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="col-lg-12">
    <a href="/api/adicionarhq" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
</div>
    <body>
{{--    {{dd($hqPersonagem)}}--}}
    @foreach($hqPersonagem as $comic)
{{--        {{dd($comic)}}--}}
    <form action="{{ route('api.store') }}" method="post">
        @csrf
        <div id="title">
            <input type='text' name='title' value={{$comic['title']}} hidden/>
            {{ $comic['title'] }}
        </div>
            <div id="images">

                <img src="{{ $img = $comic['images'][0]['path']}}.jpg">
                <input type='text' name='images' value={{$img}} hidden/>

            </div>
        <button class="btn btn-success btn-md" style="margin-top: 13px;"> Adicionar HQ </button>
    </form>
    @endforeach
    </body>

</x-layout>
