<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    protected $guarded  = [];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles');
    }
}
