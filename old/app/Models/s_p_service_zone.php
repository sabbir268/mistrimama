<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class s_p_service_zone extends Model
{
    public function zones()
    {
        return $this->hasMany('App\Zone', 'id');
    }
}
