<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service_providers_comrads extends Model
{

    protected $guarded = [];

    public function applyService()
    {
        return $this->morphOne('App\Models\category', 'category_id');
    }

    public function serviceProvider()
    {
        return $this->belongsTo('App\Models\service_providers', 's_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 's_id');
    }

    public function serviceSystem()
    {
        return $this->hasMany('App\ServiceSystem', 'service_provider_comrad_id');
    }

    public function getCPhoneNoAttribute($value)
    {
       return  $this->attributes['c_phone_no'] = "+88".$value;
    }

    // public function getc_picAttribute($value)
    // {
    //     return 'uploads/SP' . $value;
    // }
}
