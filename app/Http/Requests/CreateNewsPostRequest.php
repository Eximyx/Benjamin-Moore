<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateNewsPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'category_id' => 'string|nullable',
            'content' => 'string|nullable',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable'
        ];
    }
}
