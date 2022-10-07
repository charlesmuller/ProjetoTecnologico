<x-layout title="Página de Cadastro">

    @isset($cadastroSucesso)
        <div class="alert alert-success">
            {{ $cadastroSucesso }}
        </div>
    @endisset

<form method="post" action="{{ route('cadastro.store') }}" id="formulariocadastro">
        @csrf
        <div class="form-group">
            <label for="InputNome">Seu nome completo</label>
            <input type="text" class="form-control" autofocus="" name="nomeusuario" placeholder="Seu nome" required="">
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <label for="InputEmail1">Endereço de Email</label>
            <input type="email" class="form-control" autofocus="" name="email" placeholder="Seu Email" required="">
            <small id="emailHelp" class="form-text text-muted">Nós nunca compartilhamos seu email.</small>
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <label for="InputSenha1">Senha</label>
            <input type="password" class="form-control" name="senha1" placeholder="Senha" required="">
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <label for="InputSenha2">Repita a senha</label>
            <input type="password" class="form-control" name="senha2" placeholder="Repita a senha" required="">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 20px;">Cadastrar</button>
        </div>
</form>
</x-layout>
