<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles');
    }
}
