<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsAttributes extends Model {

    public $timestamps = false;
    public $table = 'pages_attribute';
    protected $fillable = [
        "page_id", "type", "name", "url", "value", "alt_text"
    ];

    public function pages() {
        return $this->belongsTo('App\Cms', 'page_id');
    }

}
