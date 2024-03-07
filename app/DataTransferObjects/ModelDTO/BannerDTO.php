<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\UploadedFile;

class BannerDTO implements ModelDTO
{
    public function __construct(
        public readonly string       $title,
        public readonly string       $content,
        public readonly ?string      $banner_position_id,
        public readonly UploadedFile $image,
    )
    {

    }

    public static function appRequest(BannerRequest $request): BannerDTO
    {
        return new BannerDTO(
            $request['title'],
            $request['content'],
            $request['banner_position_id'],
            $request['image'] ? $request['image'] : new UploadedFile('storage/image/default_post.jpg', 'banner_1.jpg'),
        );

    }
}
