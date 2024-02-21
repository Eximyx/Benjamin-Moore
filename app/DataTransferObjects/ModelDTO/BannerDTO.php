<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateBannerRequest;
use Illuminate\Http\UploadedFile;

class BannerDTO implements ModelDTO
{
    public function __construct(
        public readonly string       $title,
        public readonly string       $content,
        public readonly UploadedFile $image,
    )
    {

    }

    public static function appRequest(CreateBannerRequest $request): BannerDTO
    {
        return new BannerDTO(
            $request['title'],
            $request['content'],
            $request['image'] ? $request['image'] : new UploadedFile(storage_path('image/') + '/default_post.jpg'),
        );

    }
}
