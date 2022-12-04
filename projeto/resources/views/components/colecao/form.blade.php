<form action="{{ $action }}" method="post">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div class="group-form">
        <label for="nome"></label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control"
               autofocus
               @isset($nome)value="{{$nome}}" @endisset
        >
        <button type="submit" name="adicionar" class="btn btn-primary btn-lg" style="position: relative; top: 50px;">Salvar</button>
    </div>
</form>
