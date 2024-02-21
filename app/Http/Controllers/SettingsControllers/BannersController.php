<?php

namespace App\Http\Controllers\SettingsControllers;

use App\DataTransferObjects\ModelDTO\BannerDTO;
use App\DataTransferObjects\ToggleBannersDTO;
use App\Http\Controllers\CoreController;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\ToggleBannerRequest;
use App\Http\Resources\BannerResource;
use App\Http\Resources\ToggleResource;
use App\Services\SettingsServices\BannerService;
use Illuminate\Http\Resources\Json\JsonResource;

class BannersController extends CoreController
{
    public function __construct(BannerService $service)
    {
        parent::__construct($service, BannerDTO::class, BannerResource::class, CreateBannerRequest::class);
    }

    public function toggle(ToggleBannerRequest $request): JsonResource
    {
        $dto = ToggleBannersDTO::appRequest($request);

        return ToggleResource::make($this->service->toggle($dto));
    }
}
