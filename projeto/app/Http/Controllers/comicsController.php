<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Comic;
use Illuminate\Http\Request;

class comicsController extends Controller
{
    public function index(Collection $colecao)
    {
        return view('comics.index', [
            'comics' => $colecao->comics,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function readed(Request $request, Collection $colecao)
    {
//        dd($colecao->comics);
        $readedComics = $request->comics;

        $colecao->comics->each(function (Comic $comic) use ($readedComics){

            $comic->readed_comic = in_array($comic->id, $readedComics);
        });
        $colecao->push();

        return to_route('comics.index', $colecao->id)->with('mensagem.sucesso', 'Quadrinhos marcados como lidos');
    }
}
