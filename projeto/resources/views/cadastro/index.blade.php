<x-layout title="Página de Cadastro">
<form method="post" action="" style="width: 420px; margin: 50px auto 0px auto">
{{--    " --}}
        <div class="form-group">
            <label for="InputNome">Seu nome completo</label>
            <input type="text" class="form-control" id="InputNome" autofocus="" aria-describedby="emailHelp" placeholder="Seu nome" required="">
        </div>
        <div class="form-group">
            <label for="InputEmail1">Endereço de Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" autofocus="" aria-describedby="emailHelp" placeholder="Seu Email" required="">
            <small id="emailHelp" class="form-text text-muted">Nós nunca compartilhamos seu email.</small>
        </div>
        <div class="form-group">
            <label for="InputSenha1">Senha</label>
            <input type="password" class="form-control" id="InputSenha1" placeholder="Senha" required="teste">
        </div>
        <div class="form-group">
            <label for="InputSenha2">Repita a senha</label>
            <input type="password" class="form-control" id="InputSenha2" placeholder="Repita a senha" required="">
        </div>
        <button type="submit" name="cadastrar" class="btn btn-primary btn-lg">Cadastrar</button>
</form>
</x-layout>
