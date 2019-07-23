<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['blog-category.create'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        //die();
        return [
            "title" => 'required',
            "url" => 'required|unique:blog_category',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'status' => 'required',
//            'meta_description'=>'required',
//            'meta_title'=>'required',
//            'meta_keyword'=>'required',
//            
        ];
    }

    public function messages() {
        return [];
    }

}
