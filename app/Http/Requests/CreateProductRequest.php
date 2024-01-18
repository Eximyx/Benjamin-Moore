<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required',
            'main_image' => 'nullable',
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
            'product_category_id' => 'required',
        ];
    }
}
