<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model {
    
    public $table = 'blogs';

    protected $fillable = [
        "category_id", "title", "slug", "url", "users_id", "image", "content","short_description","meta_title", "meta_description", "meta_keyword", "status"
    ];
    
    
    
    public function category(){
        return  $this->belongsTo('App\BlogCategory','category_id');
    }
        
    public function users(){
        return  $this->belongsTo('App\User','users_id');
    }
    
}

