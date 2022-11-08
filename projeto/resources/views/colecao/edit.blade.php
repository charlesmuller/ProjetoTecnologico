<x-layout title="Editar Coleção '{!! $colecao->name_collection !!}'">
    <x-colecao.form :action="route('colecao.update', $colecao->id)" :nome="$colecao->name_collection" :update="true"/>

    <a href="/colecao" class="btn btn-dark">Voltar</a>
</x-layout>
