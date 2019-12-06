<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_dodatak extends Model
{
    
    protected $fillable = [

        'id_product',
        'id_dodatak',
        'created_at',
        'updated_at'

    ];

}
