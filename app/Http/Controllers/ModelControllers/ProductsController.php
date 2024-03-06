<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductDTO;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductShowResource;
use App\Http\Resources\SettingsResource;
use App\Services\ModelServices\ProductService;
use App\Traits\MetadataTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsController extends BaseAdminController
{
    use MetadataTrait;

    protected SettingsResource $settings;

    public function __construct(ProductService $service)
    {
        parent::__construct($service, ProductDTO::class, ProductResource::class, CreateProductRequest::class);
        $this->settings = $this->getSettings();
    }

    public function store(Request $request): JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);

        return $this->resource::make($entity);
    }

    public function show(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

        $entity['colors'] = $this->service->getSelectableColors($request['id']);

        return $this->resource::make($entity);
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $data = ProductShowResource::make([
                'entity' => $entity,
                'latest' => $this->service->getLatest(),
                'similar' => $this->service->getSimilar($entity->product_category_id),
                'meta' => $this->getMetaDataByRequest(),
                'settings' => $this->settings,
            ]
        );

        return view('frontend.products-details', ['data' => $data]);
    }

    public function filter(ProductFilterRequest $request): View
    {
        $entities = $this->service->fetchProducts($request);

        return view('user.catalog', ['Products' => $entities['products'], 'category' => $entities['categories']]);

    }
}
