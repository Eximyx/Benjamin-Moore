<?php

namespace App\Http\Controllers\SettingsControllers;

use App\DataTransferObjects\ModelDTO\SettingsDTO;
use App\Http\Requests\SettingsRequest;
use App\Http\Resources\SettingsResource;
use App\Services\SettingsService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(protected SettingsService $service)
    {

    }

    public function index(): View
    {
        $resource = (array)SettingsResource::make($this->service->settingsFetch());

        return view('admin.settings', $resource);
    }

    public function settings(SettingsRequest $request): JsonResource
    {
        $dto = SettingsDTO::appRequest($request);

        $entity = $this->service->settingsSet($dto);

        return SettingsResource::make($entity);
    }
}
