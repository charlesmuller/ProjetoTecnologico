<x-layout title="Login">
<form method="post" style="width: 420px; margin: 50px auto 0px auto">
        <h1>Área de login</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de Email</label>
            <input type="email" class="form-control" name="loginemail" autofocus="" placeholder="Seu Email" required="">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Password">
        </div>
        <div class="form-group">
        <button type="submit" name="entrar" class="btn btn-primary">Entrar</button>
        </div>
</form>
</x-layout>
