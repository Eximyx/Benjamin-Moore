<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'product_category_id' => 'nullable|array',
            'kind_of_work_id' => 'nullable|array',
            'price' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
