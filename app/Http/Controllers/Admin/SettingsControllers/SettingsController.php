<?php

namespace App\Http\Controllers\Admin\SettingsControllers;

use App\DataTransferObjects\ModelDTO\SettingsDTO;
use App\Http\Requests\SettingsRequest;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Services\Admin\SettingsServices\SettingsService;
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
        $resource = SettingsResource::make($this->service->settingsFetch());

        return view('admin.pages.settings', ['data' => $resource]);
    }

    public function settings(SettingsRequest $request): JsonResource
    {
        $dto = SettingsDTO::appRequest($request);

        $entity = $this->service->settingsSet($dto);

        return SettingsResource::make($entity);
    }
}
