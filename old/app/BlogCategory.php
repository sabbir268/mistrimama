<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model {

    public $table = 'blog_category';
    protected $fillable = [
        "title", "url", "image", "description", "user_id", "status","meta_title","meta_keyword","meta_description"
    ];

}
