<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileEdit extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $user_type = Auth::user()->user_type;
        $id = Auth::user()->id;
        if ($user_type == 4) {
            return [
                'name' => 'required',
                'dob' => 'required|date_format:"d-m-Y"',
                'phone' => 'required|numeric|digits:10',
                'address' => 'required',
                'state' => 'required',
                'suburb' => 'required',
                'postcode' => 'required|integer',
            ];
        } else if ($user_type == 3) {
            return [
                    'name' => 'required',
                    
                    'phone' => 'required|numeric|digits:10',
                    'address' => 'required',
                    'state' => 'required',
                    'suburb' => 'required',
                    'postcode' => 'required|numeric|digits:4',
                    'company_name' => 'required',
                    'abn' => 'required|digits:11',
//                    'service_approval_number' => 'required|integer|digits:8',
//                    'provider_approval_number' => 'required|integer|digits:8',
                    'service_approval_number' => 'required|regex:/^(SE-)?\d{8}$/|unique:users,service_approval_number,'.$id,
                    'provider_approval_number' => 'required|regex:/^(PR-)?\d{8}$/',
            ];
        } else {
            return [];
        }
    }

    public function messages() {
        return [
            'dob.*' => 'The date of birth does not match the format DD-MM-YYYY',
            'abn.digits' => "Australian Business numbe must be an integer and must be 11 digits",
            'service_approval_number.*' => "Service approval number(SE) incorrect.",
            'provider_approval_number.*' => "Provider approval number(PR) incorrect.",
        ];
    }

}
