<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service_providers_services extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\category', 'sc_id');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\Models\sub_category', 'ssc_id');
    }
}
