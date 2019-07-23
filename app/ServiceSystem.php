<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class ServiceSystem extends Model
{
    protected $table = 'service_systems';

    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo('App\Models\service_providers', 'service_provider_id');
    }
    public function comrade()
    {
        return $this->belongsTo('App\Models\service_providers_comrads', 'service_provider_comrad_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking','order_id');
    }
}
