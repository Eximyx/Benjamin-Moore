<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\StaticPageDTO;
use App\Http\Requests\CreateStaticPageRequest;
use App\Http\Resources\StaticPageResource;
use App\Services\ModelServices\StaticPageServiceBase;

class StaticPageController extends BaseAdminController
{
    public function __construct(
        StaticPageServiceBase $service
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
