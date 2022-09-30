<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.index');
    }

    public function store(Request $request)
    {
        $nomeUsuario = $request->input('nomeusuario');
        $emailUsuario = $request->input('email');
        $senha1Usuario = $request->input('senha1');
        $senha2Usuario = $request->input('senha2');

        if ($senha1Usuario == $senha2Usuario){
            $senhaUsuario = $senha1Usuario;
        }else{
            return redirect('/cadastro');
        }
        if (DB::insert('INSERT INTO users (name_user, email_user, password_user) VALUES (?,?,?)', [$nomeUsuario, $emailUsuario, $senhaUsuario])) {
            return redirect('/login');
        } else {
            return "Deu ruim";
        }
    }
}
