<?php /** @noinspection Annotator */

namespace App\DataTransferObjects;

use App\Http\Requests\CreateProductRequest;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly int $code,
        public readonly string $gloss_level,
        public readonly string $description,
        public readonly string $type,
        public readonly string $colors,
        public readonly string $v_of_dry_remain,
        public readonly string $time_to_repeat,
        public readonly string $consumption,
        public readonly string $thickness,
        public readonly string $base,
        public readonly int    $product_category_id,
        public mixed           $main_image,
    )
    {

    }

    public static function appRequest(CreateProductRequest $request): ProductDTO
    {
        return new ProductDTO(
            $request['title'],
            $request['content'],
            $request['code'],
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
            $request['main_image'],
        );

    }

}
