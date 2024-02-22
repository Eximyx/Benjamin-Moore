<?php

namespace App\Http\Controllers\SettingsControllers;

use App\DataTransferObjects\ModelDTO\ContactsDTO;
use App\Http\Requests\ContactsRequest;
use App\Http\Resources\ContactsResource;
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
        $sections = $this->service->getSections();
        $activeSections = $this->service->getActiveSections();
        $contacts = $this->service->contactsFetch();

        $banners = $this->service->getBanners();
        $activeBanners = $this->service->getActiveBanners();

        return view('admin.dashboard', compact(['sections', 'contacts', 'banners', 'activeSections', 'activeBanners']));
    }

    public function contacts(ContactsRequest $request): JsonResource
    {
        $dto = ContactsDTO::appRequest($request);

        $entity = $this->service->contacts($dto);

        return ContactsResource::make($entity);
    }

}
