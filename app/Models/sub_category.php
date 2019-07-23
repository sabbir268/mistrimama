<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{

    protected $fillable = [
        "name", "c_id", 'price', 'unit_remark', 'additional_price', 'description'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\category', 'c_id');
    }

    public function sub_cat_details()
    {
        return $this->hasMany('App\Models\sub_category_details', 'sub_categories_id');
    }

    public function booking()
    {
        return $this->hasMany('App\Models\category', 'c_id');
    }
}
