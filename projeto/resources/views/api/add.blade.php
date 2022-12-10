<x-layout title="Adicionar HQ na Coleção" >
{{--    :mensagem="$mensagem"  ver mensagem de erro--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .boxInput{
            padding: 0.375rem 0.75rem 0.375rem 0.75rem;
            font-size: 2rem;
            margin-top: 50px;
        }
    </style>
<div>
    <a href="/colecao" class="btn btn-dark" style="position: absolute; top: 11%; left: 15%">Voltar</a>
</div>
    <body onload="character()">
        <form action="{{ route('api.chamada') }}" method="post">
            @csrf
             <div class="group-form">
                 <input class="form-control boxInput" required type="text" name="name" id="name" autofocus>
            </div>
            <div>
            <button type="submit" class="btn btn-primary btn-lg" style="position: relative; top: 50px;">Buscar</button>
            </div>
        </form>
    <div>

    </div>
    </body>
</x-layout>
