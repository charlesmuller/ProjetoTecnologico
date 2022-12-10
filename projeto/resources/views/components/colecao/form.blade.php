<form action="{{ $action }}" method="post">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div class="group-form" style="position: absolute; width: 800px; right: 29%;">
        <label for="nome"></label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control"
               autofocus
               style="padding: 0.375rem 0.75rem 0.375rem 0.75rem; font-size: 2rem"
               @isset($nome)value="{{$nome}}" @endisset
        >
        <button type="submit" name="adicionar" class="btn btn-primary btn-lg" style="position: relative; top: 50px;">Salvar</button>
    </div>
</form>
