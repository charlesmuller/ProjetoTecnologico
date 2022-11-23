<x-layout title="Seus Quadrinhos" :mensagem-sucesso="$mensagemSucesso">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div><a href="/colecao" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a></div>
    <form method="post">
        @csrf
        <ul class="list-group" style="margin-top: 20px;">
            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #DCDCDC; padding-left: 0">
                <ul>Edicão</ul><ul>Título</ul><ul>Personagem</ul><ul>Lido?</ul>
            </li>

            @foreach($comics as $comic)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="badge bg-secondary">
                    {{ $comic->id}}
                    </span>
                    <ul>{{ $comic->title_comic }}</ul>
                    <ul>{{ $comic->character_comic }}</ul>
                    <input
                        type="checkbox"
                        name="comics[]"
                        value="{{ $comic->id }}"
                        @if($comic->readed_comic) checked @endif />
    {{--                para enviar a informação ao comicsController com o check do quadrinho lido--}}

                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
