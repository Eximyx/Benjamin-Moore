<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
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
            'title' => 'string',
            'content' => 'string',
            'banner_position_id' => 'string|nullable',
            'image' => 'image|nullable',
        ];
    }
}
