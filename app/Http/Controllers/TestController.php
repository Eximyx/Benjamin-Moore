<?php

namespace App\Http\Controllers;

use App\Actions\WrapItems;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\ModelResources\ColorResource;
use App\Http\Resources\ModelResources\ProductCategoryResource;
use App\Http\Resources\ModelResources\ProductResource;
use App\Services\Admin\ModelServices\ProductService;
use App\Traits\MetaDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    use MetaDataTrait;
    
    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function erik(ProductFilterRequest $request)
    {
        $data = $this->service->fetchProducts($request);

        return view('site.pages.catalog',
            [
                'data' => JsonResource::make([
                    'products' => ProductResource::collection($data['products']),
                    'colors' => ColorResource::collection($this->service->getColors()),
                    'categories' => ProductCategoryResource::collection($data['categories']),
                    'meta' => $this->getMetaDataByURL(),
                ]),
            ]
        );

    }
}
