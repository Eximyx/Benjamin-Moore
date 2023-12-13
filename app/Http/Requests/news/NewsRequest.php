<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'id'=>'nullable|numeric',
            'title'=>'required|string',
            'content'=> 'string',
            'main_image'=>'file',
            'categoriesArr'=> '',
            'category_id'=>'required',
            'slug'=>'',
        ];
    }
}
