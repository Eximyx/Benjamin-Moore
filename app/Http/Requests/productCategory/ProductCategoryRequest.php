<?php

namespace App\Http\Requests\productCategory;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            // $table->string('title');
            // $table->boolean('kind_of_work');
            // $table->text('description');
            // $table->string('slug')->unique();
        return [
        ];
    }
}
