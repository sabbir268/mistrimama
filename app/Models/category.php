<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name', 'main_image', 'icon_image', 'image_hover', 'slug', 'description',
        'unique_benefits', 'service_category', 'position_number'
    ];
    public function subcat()
    {
        return $this->hasMany('App\Models\sub_category', 'c_id', 'id');
    }
    public function service_system()
    {
        return $this->belongsTo('App\ServiceSystem');
    }

    public function booking()
    {
        return $this->hasMany('App\ServiceSystem');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
