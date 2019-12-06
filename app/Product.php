<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [

        'category',
        'title',
        'description',
        'cena',
        'na_naslovnoj',
        'cena_32',
        'cena_50',
        'slika',
        'status',
        'created_at',
        'updated_at'

    ];

}
