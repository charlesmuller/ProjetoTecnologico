<form action="{{ $action }}" method="post">
    @csrf
    @isset($nome)
        @method('PUT')
    @endisset
    <div class="group-form">
        <label for="nome">Nome da Coleção</label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control"
               @isset($nome)value="{{$nome}}" @endisset
               required>
        <button type="submit" name="adicionar" class="btn btn-primary btn-lg">Adicionar</button>
    </div>
</form>
