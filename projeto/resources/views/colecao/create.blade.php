<x-layout title="Nova Coleção">
    <div style="position: static">
        <a href="/colecao" class="btn btn-dark" style="position: absolute; left: 16%; top: 12%;">Voltar</a>
    </div>
    <x-colecao.form :action="route('colecao.store')" :nome="old('nome')" :update="false" />
</x-layout>
