<x-layout title="Excluir Coleção">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .botao-delete{
            margin-top: 13px;
            font-size: 20px;
        }
        li::marker{
            content: none;
        }
        .aviso-delete{
            font-size: 30px;
            color: red;
            font-weight: bold;
            margin-top: 5%;
            margin-bottom: 5%;
        }
        :disabled {
            background-color:#d9d9d9;
            color:black;
        }
        .input-text{
            text-align: center;
            padding: 0.375rem 0.75rem 0.375rem 0.75rem; font-size: 2.5rem;
            border-radius: 5px;
        }
        .box-input{
            margin-top: 5%;
        }

    </style>
    <a href="/colecao" class="btn btn-dark" style="position: absolute; right: 80%; top: 12%;">Voltar</a>

    <div class="box-input">
        <input type="text" class="input-text" value="{{ $colecao->name_collection }}" disabled>
    </div>
    <div class="aviso-delete">
        <span>
            Atenção: ação irreversível <br>
            Tem certeza que deseja excluir a coleção <br>
            inteira com todos os itens?
        </span>
    </div>
    <li>
        <form action="{{ route('colecao.destroy', $colecao->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-md botao-delete">Excluir</button>
        </form>
    </li>
</x-layout>
