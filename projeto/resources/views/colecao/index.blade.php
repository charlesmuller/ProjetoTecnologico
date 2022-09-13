<x-layout title="Sua coleção">
    <a href="/colecao/criar" class="btn btn-dark mb-3">Adicionar</a>
    <ul class="list-group">
        @foreach($quadrinhos as $quadrinho)
            <li class="list-group-item">{{$quadrinho}}</li>
        @endforeach
    </ul>
</x-layout>
