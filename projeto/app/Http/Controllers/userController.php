<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class userController extends Controller
{
    public function index()
    {
        return view('cadastro.index');
    }

    public function store(Request $request)
    {
        $nomeUsuario = $request->nomeusuario;
        $emailUsuario = $request->email;
        $senha1Usuario = $request->senha1;
        $senha2Usuario = $request->senha2;

        if ($senha1Usuario == $senha2Usuario){
            $senhaUsuario = $senha1Usuario;
        }else{
            return redirect('/cadastro');
        }

        $cadastro = new User();
        $cadastro->name_user = $nomeUsuario;
        $cadastro->email_user = $emailUsuario;
        $cadastro->password_user = $senhaUsuario;

        try {
            $cadastro->save();
            return redirect('/login');

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
