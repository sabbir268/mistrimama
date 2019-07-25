<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    public $table = 'cluster';

    protected $fillable = [
        "svg_area_id", "name"
    ];

    public function zones()
    {
        return $this->hasMany('App\Zone', 'clusterid', 'id');
    }
}
