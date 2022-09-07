<?php
use App\Http\Controllers\cadastroController;
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    <title>Atividade Avaliativa</title>
    <title>Cadastre-se</title>
</head>
<body>
<form method="post" style="width: 420px; margin: 150px auto 0px auto">
        <h1>Faça seu cadastro</h1>
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
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>

    </div>
</form>
</body>
</html>
