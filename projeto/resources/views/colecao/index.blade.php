<x-layout title="Sua coleção">
    <a href="/colecao/criar">adicionar</a>
    <ul>
        @foreach($quadrinhos as $quadrinho)
            <li>{{$quadrinho}}</li>
        @endforeach
    </ul>
</x-layout>
