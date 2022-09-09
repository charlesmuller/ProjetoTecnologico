<x-layout title="Sua coleção">
    <ul>
        @foreach($quadrinhos as $quadrinho)
            <li>{{$quadrinho}}</li>
        @endforeach
    </ul>
</x-layout>
