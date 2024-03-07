<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\BannerDTO;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\BannerResource;
use App\Services\SettingsServices\BannerService;

class BannersController extends BaseAdminController
{
    public function __construct(BannerService $service)
    {
        parent::__construct($service, BannerDTO::class, BannerResource::class, BannerRequest::class);
    }
}
