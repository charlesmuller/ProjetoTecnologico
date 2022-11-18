<?php

namespace App\Providers;

use App\Repositories\CollectionRepository;
use App\Repositories\EloquentCollectionRepository;
use Illuminate\Support\ServiceProvider;

class CollectionRepositoryProvider extends ServiceProvider
{
    /**
     * Sempre que precisar da CollectionRepository será instanciada a EloquentCollectionRepository
     */

    public array $bindings = [
        CollectionRepository::class => EloquentCollectionRepository::class
    ];
}
