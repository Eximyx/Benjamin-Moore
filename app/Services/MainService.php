<?php

namespace App\Services;

use App\Actions\WrapItems;
use App\Http\Resources\NewsPostResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReviewResource;
use App\Models\Settings;
use App\Repositories\ModelRepositories\LeadsRepository;
use App\Repositories\ModelRepositories\NewsRepository;
use App\Repositories\ModelRepositories\PartnersRepository;
use App\Repositories\ModelRepositories\ProductRepository;
use App\Repositories\ModelRepositories\ReviewRepository;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Repositories\SettingRepositories\SectionRepository;
use App\Repositories\SettingRepositories\SettingsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainService
{
    public function __construct(
        protected NewsRepository     $newsRepository,
        protected ProductRepository  $productRepository,
        protected ReviewRepository   $reviewRepository,
        protected LeadsRepository    $leadsRepository,
        protected BannersRepository  $bannersRepository,
        protected SectionRepository  $sectionRepository,
        protected PartnersRepository $partnersRepository,
        protected SettingsRepository $settingsRepository,
        protected WrapItems          $wrapItems
    )
    {

    }

    /**
     * @return Collection<int, Model>
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getBannersForMain(): Collection
    {
        return $this->bannersRepository->getBannersWithPositions();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getPartners(): Collection
    {
        return $this->partnersRepository->getLatest()->get();
    }

    public function getSettings(): Settings
    {
        return $this->settingsRepository->first();
    }

    /**
     * @return Collection<int, Model>
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getSectionsForMain(): Collection
    {
        return $this->sectionRepository->getSectionsWithPositions();
    }

    /**
     * @return Collection<mixed>
     */
    public function newsWrapper(?int $maxSlides = 0): Collection
    {
        $wrappedItems = $this->wrapper($this->newsRepository->getLatest()->get(), $maxSlides);
        $wrappedItems->each(function ($item, $index) use ($wrappedItems) {
            $wrappedItems[$index] = NewsPostResource::collection($item);
        });

        return $wrappedItems;
    }

    public function wrapper(Collection $items, int $maxSlides = 0): Collection
    {
        return $this->wrapItems->__invoke($items, maxSlides: $maxSlides);
    }

    /**
     * @return Collection<mixed>
     */
    public function productsWrapper(?int $maxSlides = 0): Collection
    {
        $wrappedItems = $this->wrapper($this->productRepository->getLatest()->get(), $maxSlides);
        $wrappedItems->each(function ($item, $index) use ($wrappedItems) {
            $wrappedItems[$index] = ProductResource::collection($item);
        });
        return $wrappedItems;
    }

    /**
     * @return Collection<mixed>
     */
    public function reviewsWrapper(?int $maxSlides = 0): Collection
    {
        $wrappedItems = $this->wrapper($this->reviewRepository->getLatest()->get());
        $wrappedItems->each(function ($item, $index) use ($wrappedItems) {
            $wrappedItems[$index] = ReviewResource::collection($item);
        });
        return $wrappedItems;
    }

    public function getBannerByPositionId(int $id): Model
    {
        return $this->bannersRepository->getBannerByPositionId($id);
    }
}
