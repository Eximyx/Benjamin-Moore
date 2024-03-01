<?php

namespace App\Http\Controllers;

use App\Http\Resources\MainResource;
use App\Services\MainService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function __construct(
        protected MainService $service
    )
    {
    }

    public function index(): View
    {

        $resource = MainResource::make([
            'news' => $this->service->showNews(3),
            'products' => $this->service->productsWrapper(),
            'reviews' => $this->service->reviewsWrapper(),
            'banners' => $this->service->getBannersForMain(),
            'sections' => $this->service->getSectionsForMain(),
        ]);

        return view('frontend.main', compact('resource'));
    }

    public function news(): View
    {
        $newsPosts = $this->service->showNews();

        return view('frontend.news', compact('newsPosts'));
    }

    public function calc(): JsonResponse|View
    {
        return view('frontend.calculator');
    }

    public function contacts(): JsonResponse|View
    {
        return view('frontend.contacts');
    }
}
