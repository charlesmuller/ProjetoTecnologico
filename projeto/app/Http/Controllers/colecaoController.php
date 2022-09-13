<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class colecaoController extends Controller
{
    public function index(Request $request)
    {
        $quadrinhos = [
            'Homem Aranha',
            'X-Men',
            'Demolidor',
        ];
        return view('colecao.index')->with('quadrinhos', $quadrinhos);
    }
    public function create()
    {
        return view('colecao.create');
    }
}
