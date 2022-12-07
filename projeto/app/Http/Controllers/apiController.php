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

        $nameSearch = htmlentities(strtolower($request->name));  // HuLk == hulk
        $hq = $this->queryParaRetorno($nameSearch);

//        dd($nameSearch);
        $ts = time();
        $public_key = '8587449d89851b3a3d1392c699255da3';
        $private_key = '925acf924ea4582935c159e6195ecc13b9e349d5';
        $hash = md5($ts . $private_key . $public_key);

        $queryPersonagem = array(
            'nameStartsWith' => $nameSearch,
            'orderBy' => "name",
            'limit' => "10",
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        );

        $url_personagem = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($queryPersonagem);

        curl_setopt($curl, CURLOPT_URL, $url_personagem);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        $idPersonagem = $result['data']['results'][0]['id'];
//        dd($idPersonagem);

        $url_quadrinho = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem . '/comics?' . http_build_query($hq);

//        dd($url_quadrinho);

        curl_setopt($curl, CURLOPT_URL, $url_quadrinho);
        $resultQuadrinho = json_decode(curl_exec($curl), true);
        curl_close($curl);
//        dd($curl);

//        for($y = 0; $y <= 2; $y++){
//            $hqPersonagem = $resultQuadrinho['data']['results'][$y];
//        }

        $hqPersonagem = $resultQuadrinho['data']['results'];
//        dd($hqPersonagem);
//        foreach($hqPersonagem as $title){
//                 dd($title);
//        }

//        dd($hqPersonagem);

        return view('api.retorno', compact('hqPersonagem'));
    }

    public function queryParaRetorno()
    {
        $ts = time();
        $public_key = '8587449d89851b3a3d1392c699255da3';
        $private_key = '925acf924ea4582935c159e6195ecc13b9e349d5';
        $hash = md5($ts . $private_key . $public_key);

        $queryQuadrinho = array(
            'orderBy' => 'focDate',
            'limit' => '10',
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        );
//dd($queryQuadrinho);
        return $queryQuadrinho;
    }

    public function retorno($result){
        $dadosApi = $this->chamada($result);
        $persongem = $dadosApi= ['data' => 'results'];
            dd($persongem);
        return view('api.retorno', ['result' => $dadosApi]);
    }

    public function add(Request $request){
        return view('api.add');
    }

    public function store(Request $request){
        return view('api.store');
    }

}
