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
            'id' => 'numeric|nullable',
            'name' => 'string|required|min:5|max:30',
            'description' => 'string|required|min:10|max:200',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
        ];
    }
}
