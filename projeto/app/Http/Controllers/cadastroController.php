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
    {   dd($request);
        $nomeUsuario = $request->input('nomeusuario');
        $emailUsuario = $teste->input('email');

        $senha2Usuario = $request->input('senha1');
        $senha1Usuario = $request->input('senha2');

        $senhaUsuario = $senha1Usuario === $senha2Usuario ? $senha1Usuario : redirect('cadastro');

        if (DB::insert('INSERT INTO users (name_user, email_user, password_user) VALUES (?)', [$nomeUsuario, $emailUsuario, $senhaUsuario])) {
            return redirect('/login');
        } else {
            return "Deu ruim";
        }
    }
}
