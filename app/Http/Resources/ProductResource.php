<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource 
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'code' => $this->code,
            'gloss_level' => $this->gloss_level,
            'description' => $this->description,
            'type' => $this->type,
            'colors' => $this->colors,
            'v_of_dry_remain' => $this->v_of_dry_remain,
            'time_to_repeat' => $this->time_to_repeat,
            'consumption' => $this->consumption,
            'thickness' => $this->thickness,
            'base' => $this->base,
            'product_category_id' => $this->product_category_id,
            'main_image' => $this->main_image,
        ];
    }
}
