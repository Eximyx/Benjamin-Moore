<?php

namespace App\DataTransferObjects\ModelDTO;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\UploadedFile;

class BannerDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string $description
     * @param string|null $banner_position_id
     * @param UploadedFile|string|null $image
     */
    public function __construct(
        public readonly string                   $title,
        public readonly string                   $description,
        public readonly ?string                  $banner_position_id,
        public readonly UploadedFile|string|null $image,
    )
    {
    }

    /**
     * @param BannerRequest $request
     * @return BannerDTO
     */
    public static function appRequest(BannerRequest $request): BannerDTO
    {
        return new BannerDTO(
            $request['title'],
            $request['description'],
            $request['banner_position_id'],
            $request['image'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'banner_position_id' => $this->banner_position_id,
            'image' => $this->image,
        ];
    }
}
