<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model {
    
    public $pageAttribute ="";

    public $table = "pages";
    protected $fillable = [
        "title", "description",'url' ,"meta_title", "meta_keyword", "meta_description"
    ];
    
   

}
