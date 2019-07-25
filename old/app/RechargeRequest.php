<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RechargeRequest extends Model
{
    public $table = 'recharge_request';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
