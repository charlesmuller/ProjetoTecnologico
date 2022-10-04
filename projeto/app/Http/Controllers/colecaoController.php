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

        return view('colecao.index')->with('quadrinhos', $quadrinhos);
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

        return redirect('/colecao');
    }
}
