<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryFilterRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'kind_of_work_id' => 'nullable|array',
            'kind_of_work_id.*' => 'sometimes|required|string',
            'product_category_id' => 'nullable|array',
            'product_category_id.*' => 'sometimes|required|string',
        ];
    }
}
