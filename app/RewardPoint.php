<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewardPoint extends Model
{
    public $table = 'reward_points';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
