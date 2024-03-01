<?php

namespace App\Services;

use App\Actions\WrapItems;
use App\Repositories\ModelRepositories\LeadsRepository;
use App\Repositories\ModelRepositories\NewsRepository;
use App\Repositories\ModelRepositories\ProductRepository;
use App\Repositories\ModelRepositories\ReviewRepository;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Repositories\SettingRepositories\SectionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainService
{
    public function __construct(
        protected NewsRepository    $newsRepository,
        protected ProductRepository $productRepository,
        protected ReviewRepository  $reviewRepository,
        protected LeadsRepository   $leadsRepository,
        protected BannersRepository $bannersRepository,
        protected SectionRepository $sectionRepository,
        protected WrapItems         $wrapItems
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

    public function getSectionsForMain(): Collection
    {
        return $this->sectionRepository->getSectionsWithPositions();
    }

    /**
     * @param int|null $amountOfNews
     * @return Collection
     */
    public function showNews(?int $amountOfNews = null): Collection
    {
        return $this->newsRepository->getLatest(3)->get();
    }

    /**
     * @return array<array<Model>>
     */
    public function productsWrapper(int $amountOfProducts = 4): array
    {
        $items = $this->productRepository->getLatest()->get();

        return $this->wrapItems->__invoke($items, $amountOfProducts);
    }

    /**
     * @return array<array<Model>>
     */
    public function reviewsWrapper(int $amountOfReviews = 3): array
    {
        $items = $this->reviewRepository->getLatest()->get();

        return $this->wrapItems->__invoke($items, $amountOfReviews);
    }
}
