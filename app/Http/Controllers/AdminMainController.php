<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToggleableRequest;
use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class AdminMainController extends Controller
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

    public function delete(Request $request): JsonResponse
    {
        $data = $this->service->delete($request->all());

        return response()->json([$data]);
    }

    public function toggle(ToggleableRequest $request): JsonResponse
    {
        $isNulled = $this->service->toggle($request);

        return response()->json([$isNulled]);
    }

    public function contacts(Request $request): JsonResponse
    {
        return response()->json($request->all());
    }

    public function set(Request $request): JsonResponse
    {
        if (count($request->allFiles()) !== null) {
            foreach ($request->allFiles() as $key => $file) {
                $request[$key] = $file;
            }
        }

        return response()->json($request);

    }
}
