<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model {
    public $table = 'categories';
     protected $fillable = [
        "name", "description", "unique_benefits", "service_category","main_image","icon_image"
    ];

     public function subCategory() {
        return $this->hasMany('App\Models\sub_category', 'c_id');
    }
}
