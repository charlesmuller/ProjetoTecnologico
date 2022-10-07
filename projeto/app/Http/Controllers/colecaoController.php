<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class colecaoController extends Controller
{
    public function index(Request $request)
    {
        //$quadrinhos = Collection::all();
        $quadrinhos = Collection::query()->orderBy('name_collection')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('colecao.index')->with('quadrinhos', $quadrinhos)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('colecao.create');
    }

    public function store(Request $request)
    {
        $nameCollection = $request->nome;
        $collection = new Collection();
        $collection->name_collection = $nameCollection;
        $collection->save();

        $request->session()->flash('mensagem.sucesso', 'Título adicionado com sucesso!');

        return to_route('colecao.index');
    }

    public function destroy(Request $request)
    {
        Collection::destroy($request->colecao);
        $request->session()->flash('mensagem.sucesso', 'Título adicionado com sucesso!');
        return to_route('colecao.index');
    }
}
