<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'name' => 'required|string|between:2,25',
            'description' => 'nullable|string|between:5,160',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
        ];
    }
}
