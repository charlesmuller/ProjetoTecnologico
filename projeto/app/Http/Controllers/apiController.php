<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function index(Request $request){

        $comics = Comic::query()->get();
        $mensagemErro = session('mensagem.erro');
        return view('api.add')->with('comics', $comics)->with('mensagemErro', $mensagemErro);
    }

    public function chamada(Request $request){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $nameSearch = htmlentities(strtolower($request->name));  // HuLk == hulk

        //pega os dados de quadrinhos baseados no id do personagem. O id do personsagem é pego mais abaixo
        $hq = $this->queryParaRetorno();

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

        //Pega o id do personagem
        $url_personagem = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($queryPersonagem);

        curl_setopt($curl, CURLOPT_URL, $url_personagem);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);

//        For para pegar todos os ids de personsagem que vem do results
//        for($y = 0; $y <= 8; $y++){
//            $idPersonagem[] = $result['data']['results'][$y]['id'];
//        }
        $idPersonagem = $result['data']['results'][0]['id'];

//        for para pegar hqs de todos os ids de personagens que retornaram da pesquisa
//        for($y = 0; $y <= 8; $y++){
//            $url_quadrinho[] = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem[$y] . '/comics?' . http_build_query($hq);
//        }
        $url_quadrinho = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem . '/comics?' . http_build_query($hq);

        curl_setopt($curl, CURLOPT_URL, $url_quadrinho);
        $resultQuadrinho = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (!$resultQuadrinho['data']['results']){
            return to_route('api.add')->with('mensagem.erro', "Erro ao pesquisar personagem");
        }

//        for($y = 0; $y <= 9; $y++){
//            $hqPersonagem[] = $resultQuadrinho['data']['results'][$y];
//        }

//       para validar se um hq não tem uma imagem
//        $hqPersonagem = $resultQuadrinho['data']['results'];



        $hqPersonagem = $resultQuadrinho['data']['results'];
//        dd($hqPersonagem);

        return view('api.retorno', compact('hqPersonagem'));
//
}

//    função que retorna hqs conforme o id do personsagem pego na chamada acima linha 38
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

//    public function retorno($result){
//        $dadosApi = $this->chamada($result);
//        $persongem = $dadosApi= ['data' => 'results'];
//            dd($persongem);
//        return view('api.retorno', ['result' => $dadosApi]);
//    }

    public function add(Request $request){
        return view('api.add');
    }

    public function store(Request $request){
        Comic::create($request->all());
//        dd($request->title);

//        $request->save();
//        $title->title_comic = session()->get('title');
//        $input = json_encode($input);
//        $input->save();

        return view('api.add');
    }

}
