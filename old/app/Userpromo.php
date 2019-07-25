<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userpromo extends Model
{
    protected $guarded = [];

    public function promotion()
    {
        return $this->belongsTo('App\Promotion','promocode','promocode');
    }

}
