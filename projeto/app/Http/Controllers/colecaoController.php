<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class colecaoController extends Controller
{
    public function index(Request $request)
    {
        $quadrinhos = DB::select('SELECT name_collection FROM collections;');
        return view('colecao.index')->with('quadrinhos', $quadrinhos);
    }

    public function create()
    {
        return view('colecao.create');
    }

    public function store(Request $request)
    {
        $nomeColecao = $request->input('nome');
        if (DB::insert('INSERT INTO collections (name_collection) VALUES (?)', [$nomeColecao])) {
            return redirect('/colecao');
        } else {
            return "Deu ruim";
        }
    }
}
