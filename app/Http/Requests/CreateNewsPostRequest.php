<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required|max:2',
            'description' => 'string|required',
            'category_id' => 'string|required',
            'content' => 'string|required',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable'
        ];
    }
}
