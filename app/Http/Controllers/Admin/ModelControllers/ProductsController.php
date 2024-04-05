<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductDTO;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ModelResources\ColorResource;
use App\Http\Resources\ModelResources\ProductCategoryResource;
use App\Http\Resources\ModelResources\ProductResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Admin\ModelServices\ProductService;
use App\Traits\MetaDataTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    public function show(string $slug): View
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

        return view('site.pages.products-details', ['data' => $data]);
    }

    public function update(string $id, Request $request): JsonResource
    {
        $entity = $this->service->findById($id);

        $slug = $entity->slug;

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        $this->updateMetaData($slug, $entity);

        return $this->resource::make($entity);
    }

    public function store(Request $request): JsonResponse|JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);

        $this->createMetaData($entity);

        return $this->resource::make($entity);
    }

    public function destroy(Request $request): JsonResource
    {
        $entity = $this->service->destroy($request);

        $this->deleteMetaData($entity);

        return $this->resource::make($entity);
    }

    public function __invoke(ProductFilterRequest $request): View|string
    {
        if (request()->ajax()) {
            $data = $this->service->fetchProducts($request);
            return view('site.components.search-result', ['data' => [
                'products' => ProductResource::collection($data['products']),
                'categories' => ProductCategoryResource::collection($data['categories']),
            ]])->render();
        }

        return view('site.pages.catalog',
            [
                'data' => JsonResource::make([
                    'products' => ProductResource::collection($this->service->getLatestPaginated()),
                    'colors' => ColorResource::collection($this->service->getColors()),
                    'productCategories' => ProductCategoryResource::collection($this->service->getProductCategories()),
                    'settings' => $this->settings,
                    'meta' => $this->getMetaDataByURL(),
                ]),
            ]
        );
    }
}
