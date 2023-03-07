<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColecaoFormRequest;
use App\Models\Collection;
use App\Repositories\CollectionRepository;
use App\Repositories\EloquentCollectionRepository;
use Illuminate\Http\Request;

class collectionController extends Controller
{
    //Recebe um repositorio por parametro e salva ele como uma propriedade dessa classe no método store linha 30
    public function __construct(private CollectionRepository $repository) {

    }
    public function index(Request $request) {
        $colecoes = Collection::where('id_user_fk', auth()->user()->id)->get();
        $colecoesUsuario = json_decode(Collection::where('id_user_fk', auth()->user()->id)->get(), true);
        $mensagemSucesso = session('mensagem.sucesso');
        return view('colecao.index', compact('colecoesUsuario', 'colecoes', 'mensagemSucesso'));
    }

    public function create() {
        return view('colecao.create');
    }

    //ColecaoFormRequest do método store faz a validação dos campos enviados pelo formulário
    public function store(ColecaoFormRequest $request) {
//        $userDados->id_user_fk = auth()->user()->id;
        $collection = $this->repository->add($request);
        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$collection->name_collection} adicionada com sucesso!");
    }

    public function destroy(Collection $colecao) {
        $colecao->delete();
        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$colecao->name_collection} removida com sucesso!");
    }

    public function edit(Collection $colecao) {
        return view('colecao.edit')->with('colecao', $colecao);
    }

    public function update(Collection $colecao, ColecaoFormRequest $request) {
        $colecao->name_collection = $request->nome;
        $colecao->save();
        return to_route('colecao.index')->with('mensagem.sucesso', "Coleção {$colecao->name_collection} atualizada com sucesso");
    }

    public function show(Collection $colecao) {
        return view('colecao.destroy')->with('colecao', $colecao);
    }
}
