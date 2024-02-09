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
            'title' => 'string|required',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
            'content' => 'string|required',
            'code' => 'numeric|required',
            'gloss_level' => 'string|required',
            'description' => 'string|required',
            'type' => 'string|required',
            'colors' => 'string|required',
            'base' => 'string|required',
            'v_of_dry_remain' => 'string|required',
            'time_to_repeat' => 'string|required',
            'consumption' => 'string|required',
            'thickness' => 'string|required',
            'product_category_id' => 'numeric|required',
        ];
    }
}
