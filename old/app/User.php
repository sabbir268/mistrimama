<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone_no', 'status', 'date_of_birth', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Models\roles', 'user_roles');
    }
    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'role'));
    }
    public function sp()
    {
        return $this->hasOne('App\Models\service_providers', 'u_id', 'id');
    }
    public function applyService()
    {
        return $this->morphOne('App\Model\category', 'category_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    // public function orderDetails()
    // {
    //     return $this->hasMany('App\OrderDetails');
    // }

    public function serviceProvider()
    {
        return $this->hasMany('App\Models\service_providers', 'u_id');
    }

    public function comrades()
    {
        return $this->hasMany('App\Models\service_providers_comrads');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }

    public function rp()
    {
        return $this->hasMany('App\RewardPoint');
    }

    public function getPhoneNoAttribute($value)
    {
       return  $this->attributes['phone_no'] = "+88".$value;
    }
}
