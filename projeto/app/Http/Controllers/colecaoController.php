<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class colecaoController extends Controller
{
    public function index(Request $request)
    {
        $quadrinhos = Collection::query()->orderBy('name_collection')->get();
        $mensagemSucesso = session('mensagem.sucesso');


        if(isset($quadrinhos)){
        return view('colecao.index')->with('quadrinhos', $quadrinhos)->with('mensagemSucesso', $mensagemSucesso);
        }else { //ver porque não funciona
            $mensagemSemColecao = session('mensagem.colecao');
            $request->session()->flash('mensagem.colecao', "Coleção adicionada com sucesso!");
            return view('colecao.index')->with('quadrinhos', $quadrinhos)->with('mensagemSemColecao', $mensagemSemColecao);
        }
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

        $request->session()->flash('mensagem.sucesso', "Coleção {$collection->name_collection} adicionada com sucesso!");

        return to_route('colecao.index');
    }

    public function destroy(Collection $colecao, Request $request)
    {
        $colecao->delete();
        $request->session()->flash('mensagem.sucesso', "Coleção {$colecao->name_collection} removida com sucesso!");

        return to_route('colecao.index');
    }

    public function add(Request $request)
    {
        return view('colecao.add');
    }
}
