<?php

namespace App\Traits;

use App\DataTransferObjects\ModelDTO\UpdateMetaDataDTO;
use App\Http\Resources\MetaDataResource;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use App\Services\ModelServices\MetaDataService;

trait MetadataTrait
{
    protected MetaDataService $metaDataService;

    public function getMetaDataByRequest(): MetaDataResource
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


    /**
     * @param string $slug
     * @param array $data
     */
    public function updateMetaDataUrl(string $slug, array $data): void
    {
        $this->metaDataService = $this->injectMetaDataService();

        $entity = $this->metaDataService->findBySlug($slug);

        $urlArr = explode('/', $entity['url']);


        $urlArr[count($urlArr) - 1] = $data['slug'];

        $dto = UpdateMetaDataDTO::appRequest([
            'url' => implode('/', $urlArr),
            'title' => $data['title'],
        ]);

        $this->metaDataService->update($entity, $dto);
    }

    public function getSettings(): SettingsResource
    {
        return SettingsResource::make(
            app(Settings::class)
        );
    }
}
