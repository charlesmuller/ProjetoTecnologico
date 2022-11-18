<x-layout title="Nova Coleção">
    <a href="/colecao" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
    <x-colecao.form :action="route('colecao.store')" :nome="old('nome')" :update="false" />
</x-layout>
