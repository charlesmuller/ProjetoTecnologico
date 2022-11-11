<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class comicsController extends Controller
{
    public function index(Collection $colecao)
    {
        $comics = $colecao->comics;
        return view('comics.index')->with('comics', $comics);
    }
}
