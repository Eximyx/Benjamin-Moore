<?php

namespace App\Services\Site;

use App\Repositories\ModelRepositories\BannersRepository;
use App\Repositories\ModelRepositories\LeadsRepository;
use App\Repositories\ModelRepositories\NewsRepository;
use App\Repositories\ModelRepositories\PartnersRepository;
use App\Repositories\ModelRepositories\ProductRepository;
use App\Repositories\ModelRepositories\ReviewRepository;
use App\Repositories\ModelRepositories\SectionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainService
{
    /**
     * @param NewsRepository $newsRepository
     * @param ProductRepository $productRepository
     * @param ReviewRepository $reviewRepository
     * @param LeadsRepository $leadsRepository
     * @param BannersRepository $bannersRepository
     * @param SectionRepository $sectionRepository
     * @param PartnersRepository $partnersRepository
     */
    public function __construct(
        protected NewsRepository     $newsRepository,
        protected ProductRepository  $productRepository,
        protected ReviewRepository   $reviewRepository,
        protected LeadsRepository    $leadsRepository,
        protected BannersRepository  $bannersRepository,
        protected SectionRepository  $sectionRepository,
        protected PartnersRepository $partnersRepository,
    )
    {

    }

    /**
     * @return Collection<int, Model>
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getBannersForMain(): Collection
    {
        return $this->bannersRepository->getBannersWithPositions();
    }

    /**
     * @return Collection<int, Model>
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getSectionsForMain(): Collection
    {
        return $this->sectionRepository->getSectionsWithPositions();
    }

    /**
     * @param int $amount
     * @return Collection<int, Model>
     */
    public function getLatestNews(int $amount = 3): Collection
    {
        return $this->newsRepository->getLatest($amount)->get();
    }

    /**
     * @param int $amount
     * @return Collection<int, Model>
     */
    public function getLatestProducts(int $amount = 20): Collection
    {
        return $this->productRepository->getLatest($amount)->get();
    }

    /**
     * @param int $amount
     * @return Collection<int, Model>
     */
    public function getLatestReviews(int $amount = 20): Collection
    {
        return $this->reviewRepository->getLatest($amount)->get();
    }
}
