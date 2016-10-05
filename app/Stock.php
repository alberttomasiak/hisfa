<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = [
        'tonnage', 'image', 'count', 'stock_id'
    ];
}
