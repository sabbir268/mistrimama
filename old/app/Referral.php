<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    public $table = 'referrals';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
