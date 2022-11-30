<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function chamada(Request $request){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $namesearch = htmlentities(strtolower($request->name));  // HuLk == hulk

        $ts = time();
        $public_key = '8587449d89851b3a3d1392c699255da3';
        $private_key = '925acf924ea4582935c159e6195ecc13b9e349d5';
        $hash = md5($ts . $private_key . $public_key);

        $query = array(
            "name" => $namesearch,
            "orderBy" => "name",
            "limit" => "10",
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        );

        $marvel_url = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($query);

        curl_setopt($curl, CURLOPT_URL, $marvel_url);

        $result = json_decode(curl_exec($curl));

        curl_close($curl);


//        dd($result);
        return view('api.retorno')->with($result);
    }


    public function retorno(Request $request){
        return view('api.retorno');
    }

    public function add(Request $request){
        return view('api.add');
    }

    public function store(Request $request){
        return view('api.store');
    }
}
//        $query_personagem = array(
//            "format" => "comic",
//            "formatType" => "comic",
//            'apikey' => $public_key,
//            'ts' => $ts,
//            'hash' => $hash,
//        );

//        $url_personagem = 'https://gateway.marvel.com:443/v1/public/characters/'.  .'/comics?' . http_build_query($query_personagem);
