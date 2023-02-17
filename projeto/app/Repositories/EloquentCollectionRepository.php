<?php
namespace App\Repositories;

use App\Http\Requests\ColecaoFormRequest;
use App\Models\Collection;
use Illuminate\Support\Facades\DB;

    /*  esse repositório implementa uma interface e a interface em
    *   App\CollectionRepository não sabe dessa classe eloquent
    *   com isso é posśivel criar e alterar para doctrine ou PDO,
    *   sem que seja preciso muito trabalho
    */
class EloquentCollectionRepository implements CollectionRepository
{
    public function add(ColecaoFormRequest $request) : Collection
    {
        return DB::transaction(function() use ($request) {
            $nameCollection = $request->nome;
            $collection = new Collection();
            $collection->name_collection = $nameCollection;
            $collection->id_user_fk = auth()->user()->id;
//            dd($collection->user);
            $collection->save();

            return $collection;
        });
    }
}
