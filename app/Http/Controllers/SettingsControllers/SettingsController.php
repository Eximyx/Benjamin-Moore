<?php

namespace App\Http\Controllers\SettingsControllers;

use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

        $banners = $this->service->getBanners();
        $activeBanners = $this->service->getActiveBanners();

        return view('admin.dashboard', compact(['sections', 'banners', 'activeSections', 'activeBanners']));
    }


    public function contacts(Request $request): JsonResponse
    {
        return response()->json($request->all());
    }

    // TODO: contacts IMPLEMENT
    public function contactsSet(Request $request): JsonResponse
    {
        return response()->json($request->all());
    }


}
