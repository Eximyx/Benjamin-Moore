<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required',
            'description' => 'string|required|max:200',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
        ];
    }
}
