<x-layout title="Nova Coleção">
    <x-colecao.form :action="route('colecao.store')" :nome="old('nome')" :update="false" />
    <a href="/colecao" class="btn btn-dark">Voltar</a>
</x-layout>
