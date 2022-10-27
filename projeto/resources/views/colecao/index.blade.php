<x-layout title="Suas coleções">

    <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3">Criar Coleção</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>

    @endisset

    @isset($quadrinhos)
        <div>
            <ul class="list-group" style="margin-top: 20px;">

                    @foreach($quadrinhos as $quadrinho)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$quadrinho->name_collection}}

                            <form action="{{ route('colecao.destroy', $quadrinho -> id) }}" method="post">
                                @csrf

                                @method('DELETE')
                                <button class="btn btn-danger btn-md" style="margin-top: 13px;"> REMOVER </button>
                                <a href="{{ route('api.add') }}" class="btn btn-info btn-md" style="margin-top: 13px;">ADICIONAR HQ</a>

                            </form>
                        </li>
                    @endforeach

            </ul>
        </div>
    @endisset
   @isset($mensagemSemColecao)
       <li class="list-group-item d-flex justify-content-between align-items-center">
           <div class="alert alert-success">
               {{$mensagemSemColecao}}
           </div>
       </li>
    @endisset
</x-layout>
