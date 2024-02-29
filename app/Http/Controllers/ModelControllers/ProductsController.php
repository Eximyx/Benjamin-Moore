<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductDTO;
use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductShowResource;
use App\Services\ModelServices\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsController extends BaseAdminController
{
    public function __construct(ProductService $service)
    {
        parent::__construct($service, ProductDTO::class, ProductResource::class, CreateProductRequest::class);
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $resource = (array)ProductShowResource::make([
                "entity" => $entity,
                "latest" => $this->service->getLatest(),
                "similar" => $this->service->getSimilar($entity->product_category_id),
            ]
        );

        return view('frontend.products-details', $resource);
    }
}
