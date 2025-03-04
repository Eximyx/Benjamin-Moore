<?php

namespace App\Http\Resources\ModelResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sub_content' => $this['sub_content'],
            'code' => $this['code'],
            'price' => $this['price'],
            'gloss_level' => $this['gloss_level'],
            'description' => $this['description'],
            'type' => $this['type'],
            'colors' => JsonResource::collection($this->colors()->get()),
            'v_of_dry_remain' => $this['v_of_dry_remain'],
            'time_to_repeat' => $this['time_to_repeat'],
            'consumption' => $this['consumption'],
            'thickness' => $this['thickness'],
            'base' => $this['base'],
            'product_category_id' => $this['product_category_id'],
            'main_image' => $this['main_image'],
        ];
    }
}
