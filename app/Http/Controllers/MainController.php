<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\MainResource;
use App\Services\MainService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function __construct(
        protected MainService $mainService
    )
    {
    }

    public function index(): View
    {

        $resource = (array)MainResource::make([
            'news' => $this->mainService->showNews(3),
            'products' => $this->mainService->productsWrapper(),
            'reviews' => $this->mainService->reviewsWrapper(),
            'banners' => $this->mainService->getBannersForMain(),
        ]);

        return view('frontend.main', $resource);
    }

    public function news(): View
    {
        $newsPosts = $this->mainService->showNews();

        return view('frontend.news');
    }

    public function catalog(ProductFilterRequest $request): JsonResponse|View
    {
        $entities = $this->mainService->fetchProducts();

        if (request()->ajax()) {
            $entities = $this->mainService->fetchProducts($request->validated());

            return response()->json([$entities['categories'], view('user.search_result', ['category' => $entities['categories'], 'Products' => $entities['products'], 'category_title' => $entities['category_title']])->render()]);
        }

        return view('user.catalog', ['entities' => $entities, 'Products' => $entities['products'], 'category' => $entities['categories']]);
    }

    public function newsShow(string $slug): JsonResponse|View
    {
        $NewsPost = $this->mainService->findNewsBySlug($slug);
        $NewsPosts = $this->mainService->showNews(3);

        return view('user.news_show', compact('NewsPost', 'NewsPosts'));
    }

    public function productShow(string $slug): JsonResponse|View
    {
        $item = $this->mainService->findProductBySlug($slug);
        $Products = $this->mainService->productsWrapper();

        return view('user.product', compact('item', 'Products'));
    }

    public function calc(): JsonResponse|View
    {
        return view('frontend.calculator');
    }

    public function contacts(): JsonResponse|View
    {
        return view('frontend.contacts');
    }

    public function leads(CreateLeadsRequest $request): JsonResponse
    {
        $request = $request->validated();
        $leads = $this->mainService->leadsCreate($request);

        return response()->json($leads);
    }
}
