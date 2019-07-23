<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model {

    public $timestamps = false;
    public $table = "general_setting";
    protected $fillable = ["veriable_slug", "setting_name", "setting_value", "alt_text", "field_type"];

}
