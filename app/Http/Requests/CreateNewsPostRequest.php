<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsPostRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required|min:5|max:100',
            'description' => 'string|required',
            'category_id' => 'string|nullable',
            'content' => 'string|required',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
        ];
    }
}
