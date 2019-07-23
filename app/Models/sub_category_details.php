<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_category_details extends Model
{
    public $table = 'sub_cat_details';
    
    protected $protected = [];
    public function sub_category()
    {
        return $this->belongsTo('App\Models\sub_category', 'sub_categories_id');
    }

}
