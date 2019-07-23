<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class s_p_service_cat extends Model
{
    public function category() {
        return $this->belongsTo('App\Models\category', 'cats', 'id');
    }
}
