<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ProfileDTO;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\SettingsResources\AuthResource;
use App\Services\Admin\SettingsServices\ProfileService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        protected ProfileService $service
    )
    {
    }

    public function __invoke(): View|JsonResource
    {
        if (request()->ajax()) {
            $entity = $this->service->getCurrentUser();
            $request = app(ProfileRequest::class, request()->all());

            $entity = $this->service->update(
                $entity,
                ProfileDTO::appRequest($request)
            );

            return AuthResource::make($entity);
        }

        return view('admin.pages.profile');
    }
}
