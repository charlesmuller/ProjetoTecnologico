<x-layout title="Editar Coleção '{!! $colecao->name_collection !!}'">
    <a href="/colecao" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
    <x-colecao.form :action="route('colecao.update', $colecao->id)" :nome="$colecao->name_collection" :update="true"/>
</x-layout>
