<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    //
    protected $fillable = [
        "provider_user_id", "provider", "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
