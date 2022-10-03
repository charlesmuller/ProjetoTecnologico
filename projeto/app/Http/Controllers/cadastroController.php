<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class cadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.index');
    }



}
