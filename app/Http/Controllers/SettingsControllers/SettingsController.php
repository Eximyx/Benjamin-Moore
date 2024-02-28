<?php

namespace App\Http\Controllers\SettingsControllers;

use App\DataTransferObjects\ModelDTO\ContactsDTO;
use App\Http\Requests\ContactsRequest;
use App\Http\Resources\ContactsResource;
use App\Services\ContactsService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(protected ContactsService $service)
    {

    }

    public function index(): View
    {
        $contacts = $this->service->contactsFetch();

        return view('admin.settings', compact(['contacts']));
    }

    public function contacts(ContactsRequest $request): JsonResource
    {
        $dto = ContactsDTO::appRequest($request);

        $entity = $this->service->contacts($dto);

        return ContactsResource::make($entity);
    }

}
