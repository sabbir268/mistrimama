<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsCreate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['blog.create'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        return [
            "title" => 'required',
            "category_id" => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            "url" => 'required|unique:blogs',

            'content' => 'required',
            'status' => 'required',
        ];
    }

    public function messages() {
        return [];
    }

}
