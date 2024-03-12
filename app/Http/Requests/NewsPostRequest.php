<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsPostRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'title' => 'required|string|between:5,30',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'content' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
        ];
    }
}
