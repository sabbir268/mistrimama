<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['blog.edit'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        $name = $this->route('blog');
        
        return [
            "title" => 'required',
            "category_id" => 'required',
            'image' => 'image|mimes:jpg,png,jpeg',
            "url" => 'required|unique:blogs,url,'.$name,
            'content' => 'required',
            'status' => 'required',
        ];
    }

    public function messages() {
        return [];
    }

}
