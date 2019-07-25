<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class s_p_service_time extends Model
{
    public function days()
    {
        return $this->belongsTo('App\Models\s_p_service_days', 'd_id');
    }
}
