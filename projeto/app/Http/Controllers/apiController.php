<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class apiController extends Controller
{
    public function chamada(Request $request){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $name_to_search = htmlentities(strtolower($request->name));  // HuLk == hulk

        $ts = time();
        $public_key = '8587449d89851b3a3d1392c699255da3';
        $private_key = '925acf924ea4582935c159e6195ecc13b9e349d5';
        $hash = md5($ts . $private_key . $public_key);

        $query = array(
            "name" => $name_to_search,
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
            "orderBy" => "-name",
            "limit" => "20",
        );

        $marvel_url = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($query);
        curl_setopt($curl, CURLOPT_URL, $marvel_url);

        $retorno = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return($retorno);
    }

    public function getMock(){
        $dadosApi['data'] ['results'] ['name'] ['Hulk'];
        $dadosApiJson = json_encode($dadosApi);
        return $dadosApiJson;
    }

    public function add(Request $request){
        return view('api.add');
    }

    public function store(Request $request){
        return view('api.store');
    }
}
