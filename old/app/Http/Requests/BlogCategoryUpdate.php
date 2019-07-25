<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['banner.create'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        $name = $this->route('blog_category');
        
        return [
            "title" => 'required',
            "url" => 'required|unique:blog_category,url,'.$name,
            'image' => 'image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'status' => 'required',
//            'meta_description' => 'required',
//            'meta_title' => 'required',
//            'meta_keyword' => 'required',
        ];
    }

    public function messages() {
        return [];
    }

}
