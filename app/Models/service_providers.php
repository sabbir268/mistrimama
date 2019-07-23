<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service_providers extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }
    public function comrads()
    {
        return $this->hasMany('App\Models\service_providers_comrads', 's_id');
    }
    public function services()
    {
        return $this->hasMany('App\Models\service_providers_services', 's_id', 'id');
    }
    public function time()
    {
        return $this->hasMany('App\Models\s_p_service_time', 's_id', 'id');
    }
    public function zone()
    {
        return $this->hasMany('App\Models\s_p_service_zone', 's_id', 'id');
    }
    public function days()
    {
        return $this->hasMany('App\Models\s_p_service_days', 's_id', 'id');
    }
    public function division()
    {
        return $this->hasMany('App\Models\s_p_service_division', 's_id', 'id');
    }
    public function cluster()
    {
        return $this->hasMany('App\Models\s_p_service_cluster', 's_id', 'id');
    }
    public function category()
    {
        return $this->hasMany('App\Models\s_p_service_cat', 's_id', 'id');
    }
    public function applyService()
    {
        return $this->morphOne('App\Model\category', 'category_id');
    }

    public function ServiceSystem()
    {
        return $this->hasMany('App\ServiceSystem', 'service_provider_id');
    }

    public function OrderDetails()
    {
        return $this->hasMany('App\OrderDetails', 'sp_id');
    }

}
