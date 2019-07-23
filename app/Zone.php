<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guerded = [];

    public function cluster()
    {
        return $this->belongsTo('App\Cluster', 'clusterid');
    }
}
