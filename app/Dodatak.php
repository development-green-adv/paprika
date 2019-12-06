<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dodatak extends Model
{
    
    protected $fillable = [

        'dodatak_name',
        'dodatak_price',
        'status',
        'created_at',
        'updated_at'

    ];

}
