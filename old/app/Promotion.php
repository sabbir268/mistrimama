<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    public function userpromo()
    {
        return $this->hasMany('App\Userpromo','promocode','promocode');
    }
}
