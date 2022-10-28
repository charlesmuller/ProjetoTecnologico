<x-layout title="Adicionar HQ">
<div class="col-lg-12" style="text-align: left;">
    <a href="/colecao" class="btn btn-dark" style="aling 13px;">Voltar</a>
</div>

    <form action="{{ route('api.store') }}" method="post">
        @csrf
        <div class="group-form">
            <input type="text" name="nome">
        </div>
        <div>
        <button type="submit" name="adicionar" class="btn btn-primary btn-lg">Buscar</button>
        </div>
    </form>

</x-layout>
