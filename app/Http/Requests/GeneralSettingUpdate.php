<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingUpdate extends FormRequest {

     public function authorize() {
        if (permit(['general-setting.edit'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        
        
        return [
            "setting_name" => 'required',
            "setting_value" => 'required',
        ];
    }

    public function messages() {
        return [];
    }


}
