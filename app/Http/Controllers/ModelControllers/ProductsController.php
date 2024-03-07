<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductDTO;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use App\Services\ModelServices\ProductService;
use App\Traits\MetaDataTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsController extends BaseAdminController
{

    protected SettingsResource $settings;
    use MetaDataTrait;

    public function __construct(
        ProductService $service,
    )
    {
        parent::__construct($service, ProductDTO::class, ProductResource::class, ProductRequest::class);
        $this->settings = SettingsResource::make(app(Settings::class));
    }


    public function show(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

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

        $data = JsonResource::make([
                'entity' => ProductResource::make($entity),
                'latest' => $this->service->getLatest(),
                'similar' => $this->service->getSimilar($entity->product_category_id),
                'meta' => $this->getMetaDataByURL(),
                'settings' => $this->settings,
            ]
        );

        return view('frontend.products-details', ['data' => $data]);
    }

    public function update(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

        $slug = $entity->slug;

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        $this->updateMetaData($slug, $entity);

        return $this->resource::make($entity);
    }

    public function store(Request $request): JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);
        $this->createMetaData($entity);

        return $this->resource::make($entity);
    }

    public function catalog(ProductFilterRequest $request): View
    {
        return view('frontend.catalog',
            [
                'data' => JsonResource::make([
                    'products' => ProductResource::collection($this->filter($request)['products']),
                    'colors' => ColorResource::collection($this->service->getColors()),
                    'productCategories' => ProductCategoryResource::collection($this->filter($request)['categories']),
                    'settings' => $this->settings,
                    'meta' => $this->getMetaDataByURL(),
                ]),
            ]
        );
    }

    public function filter(ProductFilterRequest $request): array
    {
        $entities = $this->service->fetchProducts($request);

        return [
            'products' => $entities['products'],
            'categories' => $entities['categories']
        ];

    }
}
