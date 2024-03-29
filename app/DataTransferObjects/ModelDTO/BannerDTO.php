<?php

namespace App\DataTransferObjects\ModelDTO;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\UploadedFile;

class BannerDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?string $banner_position_id,
        public readonly UploadedFile|string|null $image,
    ) {
    }

    public static function appRequest(BannerRequest $request): BannerDTO
    {
        return new BannerDTO(
            $request['title'],
            $request['content'],
            $request['banner_position_id'],
            $request['image'],
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'banner_position_id' => $this->banner_position_id,
            'image' => $this->image,
        ];
    }
}
