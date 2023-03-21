<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Comic;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class apiController extends Controller
{
    public function chamada(Request $request)
    {
        try {
            $nameSearch = strtolower($request->input('name'));
            $idPersonagem = $this->getCharacterId($nameSearch);
    
            if (!$idPersonagem) {
                return redirect()->route('api.add')->with('mensagem.erro', 'Personagem não encontrado');
            }
    
            $hqPersonagem = $this->getCharacterComics($idPersonagem);
            if (empty($hqPersonagem)) {
                return redirect()->route('api.add')->with('mensagem.erro', 'Quadrinhos do personagem não encontrados');
            }
    
            return view('api.retorno', compact('hqPersonagem'));
    
        } catch (Exception $e) {
            return redirect()->route('api.add')->with('mensagem.erro', $e->getMessage());
        }
    }

    private function getCharacterId($nameSearch)
    {
        $ts = time();
        $public_key = env('PUBLIC_KEY_MARVEL');
        $private_key = env('PRIVATE_KEY_MARVEL');
        $hash = md5($ts . $private_key . $public_key);
    
        $url_personagem = 'https://gateway.marvel.com:443/v1/public/characters';
        $queryPersonagem = [
            'nameStartsWith' => $nameSearch,
            'orderBy' => 'name',
            'limit' => 1,
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash
        ];
        
        $result = $this->makeRequest($url_personagem, $queryPersonagem);
    
        if (empty($result['data']['results'])) {
            throw new Exception('Personagem não encontrado.');
        }
    
        return $result['data']['results'][0]['id'];
    }
    

    private function getCharacterComics($idPersonagem)
    {
        $ts = time();
        $public_key = env('PUBLIC_KEY_MARVEL');
        $private_key = env('PRIVATE_KEY_MARVEL');
        $hash = md5($ts . $private_key . $public_key);

        $url_quadrinho = "https://gateway.marvel.com:443/v1/public/characters/{$idPersonagem}/comics";
        $queryQuadrinho = [
            'orderBy' => '-focDate',
            'limit' => 10,
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash,
        ];

        $result = $this->makeRequest($url_quadrinho, $queryQuadrinho);

        if (empty($result['data']['results'])) {
            return [];
        }

        return $result['data']['results'];
    }

    private function makeRequest($url, $query)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, ['query' => $query]);
        $result = json_decode($response->getBody(), true);
        
        return $result;
    }

    public function add(Collection $colecao){

        $comics = Comic::query()->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('api.add')->with('comics', $comics)->with('mensagemSucesso', $mensagemSucesso);

    }

    public function store(Request $request){
        $collection = Collection::where('user_id', auth()->user()->id)->get();
        $collection_id = $collection[0]['id'];        

        $personagem = $request['characters']['items'][0]['name'];
        $titulo = $request->query->get('title');
        $imagem = $request->images;

        $dadosRequest = new Comic();

        $dadosRequest->character_comic = $personagem;
        $dadosRequest->title_comic = $titulo;
        $dadosRequest->images = $imagem . '.jpg';
        $dadosRequest->collection_id = $collection_id;

        $dadosRequest->save();

        return to_route('colecao.index')->with('mensagem.sucesso', "HQ {$titulo} adicionada com sucesso!");
    }
}