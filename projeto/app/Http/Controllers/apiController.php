<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Comic;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class apiController extends Controller
{
    public function chamada(Request $request){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $nameSearch = htmlentities(strtolower($request->name));

        //pega os dados de quadrinhos baseados no id do personagem. O id do personsagem é pego mais abaixo
        $hq = $this->queryParaRetorno();

        $ts = time();
        $public_key = getenv('PUBLIC_KEY_MARVEL');
        $private_key = getenv('PRIVATE_KEY_MARVEL');
        $hash = md5($ts . $private_key . $public_key);


        $queryPersonagem = array(
            'nameStartsWith' => $nameSearch,
            'orderBy' => "name",
            'limit' => "50",
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash
            );

        //Pega o id do personagem
        $url_personagem = 'https://gateway.marvel.com:443/v1/public/characters?' . http_build_query($queryPersonagem);

        curl_setopt($curl, CURLOPT_URL, $url_personagem);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (isEmpty($result)){
            return to_route('api.add')->with('mensagem.sucesso', "Erro ao pesquisar personagem (ERRO 401 API)");
        }
        $idPersonagem = $result['data']['results'][0]['id'];
        $url_quadrinho = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem . '/comics?' . http_build_query($hq);

        curl_setopt($curl, CURLOPT_URL, $url_quadrinho);
        $resultQuadrinho = json_decode(curl_exec($curl), true);
        curl_close($curl);

        //Para pegar erro se acaso a pesquisa não retornar nada (ainda não funciona a mensagem)
        if (!$resultQuadrinho['data']['results']){
            return to_route('api.add')->with('mensagem.sucesso', "Erro ao pesquisar personagem, não encontrado");
        }

        $hqPersonagem = $resultQuadrinho['data']['results'];
        if (isEmpty($hqPersonagem)){
            return to_route('api.add')->with('mensagem.sucesso', "Erro ao pesquisar quadrinho");
        }

        return view('api.retorno', compact('hqPersonagem'));
}
//    função que retorna hqs conforme o id do personsagem pego na chamada acima linha 38
    public function queryParaRetorno()
    {
        $ts = time();
        $public_key = 'a7a498d56f5ad76c0b1457c9b7928819';
        $private_key = 'c9b23bb12332c927576978ba7269165fa048b471';
        $hash = md5($ts . $private_key . $public_key);

        $queryQuadrinho = array(
            'orderBy' => '-focDate',
            'limit' => '50',
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        );

        return $queryQuadrinho;
    }

    public function add(Collection $colecao){

        $comics = Comic::query()->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('api.add')->with('comics', $comics)->with('mensagemSucesso', $mensagemSucesso);

//        return view('api.add')->with('colecao', $colecao);
    }

    public function store(Request $request){

        $pegaIdColecao = Collection::query()->get();

        $idColecao = $pegaIdColecao[0]['id'];
        $personagem = $request['characters']['items'][0]['name'];
        $titulo = $request->query->get('title');
        $imagem = $request->images;

        $dadosRequest = new Comic();

        $dadosRequest->character_comic = $personagem;
        $dadosRequest->title_comic = $titulo;
        $dadosRequest->images = $imagem . '.jpg';
        $dadosRequest->collections_id = $idColecao;

        $dadosRequest->save();

        return to_route('colecao.index')->with('mensagem.sucesso', "HQ {$titulo} adicionada com sucesso!");
    }

}

























//        For para pegar todos os ids de personsagem que vem do results
//        for($y = 0; $y <= 8; $y++){
//            $idPersonagem[] = $result['data']['results'][$y]['id'];
//            dd($idPersonagem);
//        }

//valida se tem erro
//        if ($result['data']['results'] == 0){
//            $idPersonagem = $result['data']['results'][1]['id'];
//
//            $url_quadrinho = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem . '/comics?' . http_build_query($hq);
//
//            curl_setopt($curl, CURLOPT_URL, $url_quadrinho);
//            $resultQuadrinho = json_decode(curl_exec($curl), true);
//            curl_close($curl);
//
//            if (!$resultQuadrinho['data']['results']){
//                return to_route('api.add')->with('mensagem.erro', "Erro ao pesquisar personagem");
//            }
//
//            $hqPersonagem = $resultQuadrinho['data']['results'];
//            return view('api.retorno', compact('hqPersonagem'));
//        }



//        for para pegar hqs de todos os ids de personagens que retornaram da pesquisa
//        for($y = 0; $y <= 8; $y++){
//            $url_quadrinho[] = 'https://gateway.marvel.com:443/v1/public/characters/' . $idPersonagem[$y] . '/comics?' . http_build_query($hq);
//        }
//        for($y = 0; $y <= 9; $y++){
//            $hqPersonagem[] = $resultQuadrinho['data']['results'][$y];
//        }
//       para validar se um hq não tem uma imagem
//        $hqPersonagem = $resultQuadrinho['data']['results'];
//        dd($hqPersonagem);
//
