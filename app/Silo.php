<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silo extends Model
{
    //
    protected $fillable = [
        'number', 'volume', 'content', 'type', 'silo_id', 'id'
    ];
}
