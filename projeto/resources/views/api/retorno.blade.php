<x-layout title="Retorno da pesquisa">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="col-lg-12">
    <a href="/api/adicionarhq" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
</div>
    <body>
{{--    {{dd($hqPersonagem)}}--}}
    @foreach($hqPersonagem as $comic)
{{--        {{dd($comic)}}--}}
    <form action="{{ route('api.store', $comic['title'], $comic['images']) }}" method="post">
        @csrf
        <div>
            {{$comic['title'] }}
{{--            {{dd($title)}}--}}
            <input type='text' name='title' value={{$comic['title']}} />
        </div>
        @if(!array_key_exists(0, $comic['images']))
            <label>Sem imagem</label>
        @else
            <div id="images">
                <img src="{{ $img = $comic['images'][0]['path']}}.jpg">
                <input type='text' name='images' value={{$img}} hidden/>
            </div>
        @endif
        <button class="btn btn-success btn-md"> Adicionar HQ </button>
    </form>
    @endforeach
    </body>

</x-layout>
