<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this['id'],
            'title' => $this['title'],
            'content' => $this['content'],
            'kind_of_work_id' => $this['kind_of_work_id'],
        ];
    }
}
