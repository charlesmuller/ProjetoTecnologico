<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class colecaoController extends Controller
{
    public function index(Request $request)
    {
        $colecoes = Collection::query()->orderBy('name_collection')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('colecao.index')->with('colecoes', $colecoes)->with('mensagemSucesso', $mensagemSucesso);
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

        //$request->session()->flash('mensagem.sucesso', "Coleção {$collection->name_collection} adicionada com sucesso!"); exemplo de outra flash message

        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$collection->name_collection} adicionada com sucesso!");
    }

    public function destroy(Collection $colecao, Request $request)
    {
        $colecao->delete();

        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$colecao->name_collection} removida com sucesso!");
    }

    public function add(Request $request)
    {
        return view('api.add');
    }

    public function edit(Collection $colecao)
    {
        return view('colecao.edit')->with('colecao', $colecao);
    }

    public function update(Collection $colecao, Request $request)
    {
        $colecao->name_collection = $request->nome;
        $colecao->save();
        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$colecao->name_collection} atualizada com sucesso");
    }
}
