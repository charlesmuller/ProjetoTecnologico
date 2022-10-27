<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __invoke()
    {
    //    return Http::get('https://gateway.marvel.com:443/v1/public/characters?',[
    //         'public_key'    => '8587449d89851b3a3d1392c699255da3',
    //         'private_key'   => '925acf924ea4582935c159e6195ecc13b9e349d5',
    //    ])->json();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $name_to_search = htmlentities(strtolower($_GET['name'])); // HuLk == hulk

        $ts = time();
        $public_key = '8587449d89851b3a3d1392c699255da3';
        $private_key = '925acf924ea4582935c159e6195ecc13b9e349d5';
        $hash = md5($ts . $private_key . $public_key);

        $query = array(
            "name" => $name_to_search, //""
            "orderBy" => "name",
            "limit" => "20",
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        );

        $marvel_url = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($query);

        curl_setopt($curl, CURLOPT_URL, $marvel_url);

        $result = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return json_encode($result);

    }
    public function add(Request $request)
    {
        return view('colecao.add');
    }
}
