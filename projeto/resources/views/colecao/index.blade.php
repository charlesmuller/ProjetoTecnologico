<x-layout title="Sua coleção">
    <ul>
        @php(\App\Http\Controllers\colecaoController::class)
        @foreach($quadrinhos as $quadrinho)
            <li>{{$quadrinho}}</li>
        @endforeach
    </ul>
</x-layout>
