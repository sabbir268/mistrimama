<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    protected $guarded  = [];
  //  public $table  = 'user_roles';

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles','user_id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\roles', 'roles_id');
    }
}
