<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required|min:5|max:100',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
            'content' => 'string|required',
            'code' => 'numeric|required|max:50',
            'gloss_level' => 'string|required|min:5|max:50',
            'description' => 'string|required|max:50',
            'type' => 'string|required|max:50',
            'colors' => 'string|required|max:50',
            'base' => 'string|required|max:50',
            'v_of_dry_remain' => 'string|required|max:20',
            'time_to_repeat' => 'string|required|max:20',
            'consumption' => 'string|required|max:20',
            'thickness' => 'string|required|max:20',
            'product_category_id' => 'numeric|required',
        ];
    }
}
