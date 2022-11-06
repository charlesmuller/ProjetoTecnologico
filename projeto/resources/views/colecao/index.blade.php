<x-layout title="Suas coleções">
    <a href="{{ route('colecao.create') }}" class="btn btn-info mb-3">Criar Coleção</a>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
{{--    @isset($colecoes)--}}

           <ul class="list-group" style="margin-top: 20px;">
                    @foreach($colecoes as $colecao)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$colecao->name_collection}}

                            <span class="d-flex">
                                <a href="{{ route('colecao.edit', $colecao->id) }} " class="btn btn-primary btn-sm" style="margin-top: 13px; margin-bottom: 16px">Ed</a>

                                <form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
                                    @csrf

                                    @method('DELETE')
                                    <button class="btn btn-danger btn-md" style="margin-top: 13px;"> Rm </button>
                                    <a href="{{ route('api.add') }}" class="btn btn-info btn-md" style="margin-top: 13px;"> Add </a>
                                </form>
                            </span>
                        </li>
                    @endforeach

            </ul>
{{--    @endisset--}}
{{--   @isset($mensagemSemColecao)--}}
{{--       <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--           <div class="alert alert-success">--}}
{{--               {{$mensagemSemColecao}}--}}
{{--           </div>--}}
{{--       </li>--}}
{{--    @endisset--}}
</x-layout>
