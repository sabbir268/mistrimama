<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $guarded = [];

    protected $appends = ['name','phone','address','total_price'];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

    public function serviceSystem()
    {
        return $this->hasMany('App\ServiceSystem');
    }

    public function getNameAttribute()
    {
        if($this->type == 'others'){
            return $this->others_name;
        }
            return $this->user ? $this->user->name : "-";
    }

    public function getPhoneAttribute()
    {
        if($this->type == 'others'){
            return $this->others_phone;
        }
            return $this->user ? $this->user->phone_no : "-";
    }

    public function getAddressAttribute()
    {
        if($this->type == 'others'){
            return $this->others_addr;
        }
            return $this->user ? $this->user->address : "-";
    }

    public function getTotalPriceAttribute()
    {
            return $this->bookings->where('status',1)->sum('total_price');
    }

    // public function setAreaAttribute($val)
    // {
    //     switch ($val) {
    //         case 'XMLID_1655_':
    //             $area =  'Azimpur';
    //             break;

    //         case 'XMLID_1652_':
    //             $area =  'Badda';
    //             break;

    //         case 'XMLID_1870_':
    //             $area =  'Baridhara';
    //             break;

    //         case 'XMLID_1752_':
    //             $area =  'Dhanmondi';
    //             break;

    //         case 'XMLID_1791_':
    //             $area =  'Gulshan';
    //             break;

    //         case 'XMLID_1646_':
    //             $area =  'Khilkhet';
    //             break;

    //         case 'XMLID_1665_':
    //             $area =  'Khilgaon';
    //             break;

    //         case 'XMLID_1746_':
    //             $area =  'Mirpur';
    //             break;

    //         case 'XMLID_1738_':
    //             $area =  'Mohammadpur';
    //             break;

    //         case 'XMLID_1658_':
    //             $area =  'Motijheels';
    //             break;

    //         case 'XMLID_1765_':
    //             $area =  'New Market';
    //             break;

    //         case 'XMLID_1749_':
    //             $area =  'Old Dhaka';
    //             break;

    //         case 'XMLID_1768_':
    //             $area =  'Ramna';
    //             break;

    //         case 'XMLID_1839_':
    //             $area =  'Tejgaon';
    //             break;

    //         case 'XMLID_1661_':
    //             $area =  'Uttara';
    //             break;
    //         default:
    //             $area = "Uttara";
    //     }


    //     $this->attributes['area'] = $area;
    // }
}
