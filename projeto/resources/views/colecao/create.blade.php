<x-layout title="Nova Coleção">
    <form action="{{ route('colecao.store') }}" method="post">
        @csrf
        <div class="group-form">
            <label for="nome">Digite o nome da HQ</label>
            <input type="text" name="nome">
            <button type="submit" name="adicionar" class="btn btn-primary btn-lg">Adicionar</button>
        </div>
    </form>
    <a href="/colecao" class="btn btn-dark">Voltar</a>
</x-layout>
