<?php

namespace App\Traits;

use App\DataTransferObjects\ModelDTO\UpdateMetaDataDTO;
use App\Facades\MetaData;
use App\Http\Resources\ModelResources\MetaDataResource;
use App\Models\NewsPost;
use App\Models\Product;
use App\Models\StaticPage;
use Illuminate\Database\Eloquent\Model;

trait MetaDataTrait
{
    /**
     * @var array|string[]
     */
    protected array $entities = [
        StaticPage::class => '/',
        Product::class => '/catalog/',
        NewsPost::class => '/news/',
    ];

    /**
     * @return MetaDataResource
     */
    public function getMetaDataByURL(): MetaDataResource
    {
        return MetadataResource::make(
            MetaData::findByURL(
                request()->url()
            )
        );
    }

    /**
     * @param string $slug
     * @param Model $entity
     * @return void
     */
    public function updateMetaData(string $slug, Model $entity): void
    {
        $metaData = MetaData::findBySlug($slug) ?? null;

        if (!empty($metaData)) {
            $url = explode('/', $metaData['url']);

            $url[count($url) - 1] = $entity['slug'];

            $dto = UpdateMetaDataDTO::appRequest([
                'url' => implode('/', $url),
                'title' => $entity['title'],
            ]);

            MetaData::update($metaData, $dto);
        } else {
            $this->createMetaData($entity);
        }
    }

    /**
     * @param Model $entity
     * @return void
     */
    public function createMetaData(Model $entity): void
    {
        $url = route('user.main.index') . $this->entities[$entity::class] . $entity['slug'];

        $dto = UpdateMetaDataDTO::appRequest([
            'url' => $url,
            'title' => $entity->title,
        ]);

        MetaData::create($dto);
    }

    /**
     * @param Model $entity
     * @return Model
     */
    public function deleteMetaData(Model $entity): Model
    {
        return MetaData::destroyWithEntity($entity['slug']);
    }
}
