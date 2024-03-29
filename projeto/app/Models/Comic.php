<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    protected $fillable = [
        'title_comic',
        'img_data',
        'collection_id'
    ];
}
//'character_comic',
//'edition_number',
