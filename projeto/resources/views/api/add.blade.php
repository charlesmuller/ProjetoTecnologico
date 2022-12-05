<x-layout title="Adicionar HQ">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="col-lg-12">
    <a href="/colecao" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
</div>
    <body onload="character()">
        <form action="{{ route('api.chamada') }}" method="post">
            @csrf
             <div class="group-form">
                <input required type="text" name="name" id="name"  placeholder="(Ex. Hulk, Iron Man, Spider-Man, etc...)">
            </div>
            <div>
            <button type="submit" class="btn btn-primary btn-lg" style="position: relative; top: 50px;">Buscar</button>
            </div>
        </form>
    <div>

    </div>
    </body>
</x-layout>
