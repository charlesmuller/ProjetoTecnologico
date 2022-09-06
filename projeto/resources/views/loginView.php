<html lang="pt-br">
<head>
    <meta charset="utf-8">
<!--    <link href="{{ URL::asset('public/css/style.css') }}" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="<?php echo asset('public/css/style.css')?>" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    <title>Atividade Avaliativa</title>
</head>
<body>
<div class="formulario">
    <form method="post" action="retornoadm.php">
        <h1>Área de administrador</h1>
        <input type="text" name="login_user" placeholder="Seu usuário" autofocus="" required="">
        <input type="password" name="senha_user" placeholder="Sua senha" required="">
        <input type="reset"  name="limpar" value="Limpar campos">
        <input type="submit" name="entrar" value="ENTRAR">
        <a href="index.html">Não é administrador? <BR> <strong>CLIQUE AQUI PARA VOLTAR A PAGINA DE LOGIN</strong></a>

    </form>
</div>
</body>
</html>
