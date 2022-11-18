<?php
namespace App\Repositories;


use App\Http\Requests\ColecaoFormRequest;
use App\Models\Collection;

    /*
    *    É uma interface de repositório de coleções
    */
interface CollectionRepository
{
    public function add(ColecaoFormRequest $request) : Collection;
}



