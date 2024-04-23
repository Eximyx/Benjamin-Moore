<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\BannerDTO;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\ModelResources\BannerResource;
use App\Services\Admin\ModelServices\BannerService;

class BannersController extends BaseAdminController
{
    /**
     * @param BannerService $service
     */
    public function __construct(BannerService $service)
    {
        parent::__construct($service, BannerDTO::class, BannerResource::class, BannerRequest::class);
    }
}
