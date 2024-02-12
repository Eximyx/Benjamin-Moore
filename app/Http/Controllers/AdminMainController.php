<?php

namespace App\Http\Controllers;

use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminMainController extends Controller
{
    public function __construct(protected SettingsService $service)
    {

    }

    public function set(Request $request): JsonResponse
    {
        if (count($request->allFiles()) !== null) {
            foreach ($request->allFiles() as $key => $file) {
                $request[$key] = $file;
            }
        }
        return response()->json($request);
        return response()->json([
            $this->service->settingsSet(
                $request->only(['email', 'phone', 'location', 'instagram', 'work_time'])
            )]);
    }
}
