<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'title' => 'required|string|between:5,30',
            'kind_of_work_id' => 'nullable|string|exists:kind_of_work,id',
        ];
    }
}
