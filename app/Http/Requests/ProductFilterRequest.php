<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'product_category_id' => 'nullable|array',
            'product_category_id.*' => 'sometimes|required|numeric|exists:product_categories,id',
            'kind_of_work_id' => 'nullable|array',
            'kind_of_work_id.*' => 'sometimes|required|numeric|exists:kind_of_work,id',
            'price' => 'nullable|array',
            'price.to' => 'sometimes|required|numeric',
            'price.from' => 'sometimes|required|numeric',
            'color_id' => 'nullable|array',
            'color_id.*' => 'sometimes|required|numeric|exists:colors,id',
        ];
    }
}
