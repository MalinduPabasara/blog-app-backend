<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'blog_content' => 'required',
            'tag' => 'required',
            'date' => 'required'
        ];
    }
}
