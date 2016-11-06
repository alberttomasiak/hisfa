<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPermissions extends Authenticatable
{
        use Notifiable;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'option', 'user_id',
        ];
}
