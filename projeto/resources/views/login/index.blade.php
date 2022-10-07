<x-layout title="Área de login">

<form method="post" style="width: 420px; margin: 50px auto 0px auto">
        <div class="form-group" style="margin-top: 20px;">
            <label for="exampleInputEmail1">Endereço de Email</label>
            <input type="email" class="form-control" name="loginemail" autofocus="" placeholder="Seu Email" required="">
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Password">
        </div>
        <div class="form-group text-center" style="margin-top: 20px;">
        <button type="submit" name="entrar" class="btn btn-primary">Entrar</button>
        </div>
</form>
</x-layout>
