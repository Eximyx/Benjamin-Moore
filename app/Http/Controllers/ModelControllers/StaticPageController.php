<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\StaticPageDTO;
use App\Http\Requests\CreateStaticPageRequest;
use App\Http\Resources\StaticPageResource;
use App\Services\ModelServices\StaticPageService;

class StaticPageController extends BaseAdminController
{
    public function __construct(
        StaticPageService $service
    )
    {
        parent::__construct(
            $service,
            StaticPageDTO::class,
            StaticPageResource::class,
            CreateStaticPageRequest::class
        );
    }
}
