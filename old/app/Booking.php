<?php

namespace App;

use App\Models\category;
use App\Models\sub_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class Booking extends Model
{
    

    protected $fillable = [
         'order_id', 'booking_date', 'booking_time', 'booking_quantity', 'booking_category',
        'sub_categories', 'area'
    ];

    public function users()
    {   
        return $this->belongsTo('App\User', 'user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\category', 'booking_category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\sub_category', 'sub_categories_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function orderDetails()
    {
        return $this->belongsTo('App\OrderDetails','order_id');
    }
    

    public function serviceArea()
    {
        return $this->belongsTo('App\Cluster', 'area');
        //return $this->belongsTo('App\Cluster');
    }
    public function getCategoryAttribute()
    {
        return sub_category::find($this->booking_category);
    }

    public function getCategory()
    {
        return $this->getCategoryAttribute();
    }

    public function getSubCategoryAttribute()
    {
        return sub_category::where('id', '=', $this->sub_categories_id)->get();
    }
    
    public function setTotalPriceAttribute($value)
    {
        $qty = $this->quantity;
        if ($qty >= 1) {
            $extras = $qty -1;
        }
        $totalPrice = $this->price + ($this->aditional_price * $extras);
         $this->attributes['total_price'] = $totalPrice;


    }

    public function isAllocated()
    {
        $service = ServiceSystem::where('booking_id', '=', $this->id)->first();
        if ($service == null) {
            return false;
        }
        return $service;
    }
}
