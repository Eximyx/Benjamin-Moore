<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\ProductRequest;

class ProductDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string|null $content
     * @param string $sub_content
     * @param int|null $code
     * @param int $price
     * @param string|null $gloss_level
     * @param string|null $description
     * @param string|null $type
     * @param array|null $colors
     * @param string|null $v_of_dry_remain
     * @param string|null $time_to_repeat
     * @param string|null $consumption
     * @param string|null $thickness
     * @param string|null $base
     * @param int|null $product_category_id
     * @param mixed $main_image
     */
    public function __construct(
        public readonly string  $title,
        public ?string          $content,
        public readonly string  $sub_content,
        public readonly ?int    $code,
        public readonly int     $price,
        public readonly ?string $gloss_level,
        public readonly ?string $description,
        public readonly ?string $type,
        public ?array           $colors,
        public readonly ?string $v_of_dry_remain,
        public readonly ?string $time_to_repeat,
        public readonly ?string $consumption,
        public readonly ?string $thickness,
        public readonly ?string $base,
        public readonly ?int    $product_category_id,
        public mixed            $main_image,
    )
    {
    }

    /**
     * @param ProductRequest $request
     * @return ProductDTO
     */
    public static function appRequest(ProductRequest $request): ProductDTO
    {
        return new ProductDTO(
            $request['title'],
            $request['content'],
            $request['sub_content'],
            $request['code'],
            $request['price'],
            $request['gloss_level'],
            $request['description'],
            $request['type'],
            $request['colors'],
            $request['v_of_dry_remain'],
            $request['time_to_repeat'],
            $request['consumption'],
            $request['thickness'],
            $request['base'],
            $request['product_category_id'],
            $request['main_image'] ?? "default_post.jpg",
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'sub_content' => $this->sub_content,
            'code' => $this->code,
            'price' => $this->price,
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
