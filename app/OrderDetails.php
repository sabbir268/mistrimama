<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $table = 'orders_details';


    protected $appends = ['name','phone','address','total_price'];

    public function bookings()
    {
        return $this->hasMany('App\Booking','order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

    public function serviceSystem()
    {
        return $this->belongsTo('App\ServiceSystem','id','order_id');
    }

    public function getNameAttribute()
    {
        if($this->type == 'others'){
            return $this->others_name;
        }
            return $this->user->name;
    }

    public function getPhoneAttribute()
    {
        if($this->type == 'others'){
            return $this->others_phone;
        }
            return $this->user->phone_no;
    }

    public function getAddressAttribute()
    {
        if($this->type == 'others'){
            return $this->others_addr;
        }
            return $this->user->address;
    }

    public function getTotalPriceAttribute()
    {
            return $this->bookings->where('status',1)->sum('total_price');
    }


    public function provider()
    {
        return $this->belongsTo('App\Models\service_providers', 'sp_id');
    }
    public function comrade()
    {
        return $this->belongsTo('App\Models\service_providers_comrads', 'sp_comrade_id');
    }
}
