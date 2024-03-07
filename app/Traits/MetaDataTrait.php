<?php

namespace App\Traits;

use App\DataTransferObjects\ModelDTO\UpdateMetaDataDTO;
use App\Http\Resources\ModelResources\MetaDataResource;
use App\Models\NewsPost;
use App\Models\Product;
use App\Models\StaticPage;
use App\Services\Admin\ModelServices\MetaDataService;
use Illuminate\Database\Eloquent\Model;

trait MetaDataTrait
{
    protected array $entities = [
        StaticPage::class => '/',
        Product::class => '/catalog/',
        NewsPost::class => '/news/',
    ];

    protected MetaDataService $metaDataService;

    public function getMetaDataByURL(): MetaDataResource
    {
        $this->metaDataService = $this->injectMetaDataService();

        return MetadataResource::make(
            $this->metaDataService->findByURL(
                request()->url()
            )
        );
    }

    public function injectMetaDataService(): MetaDataService
    {
        if (empty($this->metaDataService)) {
            $this->metaDataService = app(MetaDataService::class);
        }

        return $this->metaDataService;
    }

    public function updateMetaData(string $slug, Model $entity): void
    {
        $this->metaDataService = $this->injectMetaDataService();

        $metaData = $this->metaDataService->findBySlug($slug) ?? null;

        if (!empty($metaData)) {
            $url = explode('/', $metaData['url']);

            $url[count($url) - 1] = $entity['slug'];

            $dto = UpdateMetaDataDTO::appRequest([
                'url' => implode('/', $url),
                'title' => $entity['title'],
            ]);

            $this->metaDataService->update($metaData, $dto);
        } else {
            $this->createMetaData($entity);
        }
    }

    public function createMetaData(Model $entity): void
    {
        $this->metaDataService = $this->injectMetaDataService();

        $url = route('user.main.index') . $this->entities[$entity::class] . $entity['slug'];

        $dto = UpdateMetaDataDTO::appRequest([
            'url' => $url,
            'title' => $entity->title,
        ]);

        $this->metaDataService->create($dto);
    }
}
