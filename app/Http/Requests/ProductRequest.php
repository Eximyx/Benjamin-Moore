<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'title' => 'required|string|between:5,30',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
            'content' => 'nullable|string',
            'sub_content' => 'nullable|string',
            'code' => 'nullable|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'gloss_level' => 'nullable|string|between:5,50',
            'description' => 'nullable|string|max:50',
            'type' => 'nullable|string|max:50',
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
            'base' => 'nullable|string|max:50',
            'v_of_dry_remain' => 'nullable|string|max:50',
            'time_to_repeat' => 'nullable|string|max:50',
            'consumption' => 'nullable|string|max:50',
            'thickness' => 'nullable|string|max:50',
            'product_category_id' => 'nullable|numeric|exists:product_categories,id',
        ];
    }
}
