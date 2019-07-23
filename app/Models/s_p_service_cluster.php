<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class s_p_service_cluster extends Model
{
    public function clusters()
    {
        return $this->belongsTo('App\Cluster', 'cluster');
    }
}
