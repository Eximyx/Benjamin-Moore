<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Services\MainService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function __construct(
        protected MainService $mainService
    ) {
    }

    public function index(): View
    {
        // TODO News/Products resource
        $items['news'] = $this->mainService->showNews(3);
        $items['products'] = $this->mainService->productsWrapper();
        $items['reviews'] = $this->mainService->reviewsWrapper();

        return view('user.main', ['NewsPost' => $items['news'], 'Products' => $items['products'], 'reviews' => $items['reviews']]);
    }

    public function news(): View
    {
        $newsPosts = $this->mainService->showNews();

        return view('user.news', compact('newsPosts'));
    }

    public function catalog(ProductFilterRequest $request): JsonResponse|View
    {
        $entities = $this->mainService->fetchProducts();

        /** @noinspection NullPointerExceptionInspection */
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
        return view('user.calculator');
    }

    public function contacts(): JsonResponse|View
    {
        return view('user.contacts');
    }

    public function leads(CreateLeadsRequest $request): JsonResponse
    {
        $request = $request->validated();
        $leads = $this->mainService->leadsCreate($request);

        return response()->json($leads);
    }
}
