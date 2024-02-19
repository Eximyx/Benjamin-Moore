<?php

namespace App\Services;

use App\Actions\WrapItems;
use App\Repositories\ModelRepositories\LeadsRepository;
use App\Repositories\ModelRepositories\NewsRepository;
use App\Repositories\ModelRepositories\ProductRepository;
use App\Repositories\ModelRepositories\ReviewRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class MainService
{
    public function __construct(
        protected NewsRepository    $newsRepository,
        protected ProductRepository $productRepository,
        protected ReviewRepository  $reviewRepository,
        protected LeadsRepository   $leadsRepository,
        protected WrapItems         $wrapItems
    )
    {

    }

    /**
     * @return LengthAwarePaginator<Model>
     */
    public function showNews(?int $amountOfNews = null): LengthAwarePaginator
    {
        return $this->newsRepository->getLatest($amountOfNews)->paginate($amountOfNews);
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

    public function findProductBySlug(string $slug): ?Model
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function findNewsBySlug(string $slug): ?Model
    {
        return $this->newsRepository->findBySlug($slug);
    }

    /**
     * @param array<string,mixed> $request
     */
    public function leadsCreate(array $request): ?Model
    {
        return $this->leadsRepository->create($request);
    }

    /**
     * @param array<mixed|array>|null $data
     * @return array<mixed|array>
     */
    public function fetchProducts(?array $data = null): array
    {
        $list['category_title'] = null;
        $kindOfWorkId = null;
        $category_id = null;

        if ($data) {
            $kindOfWorkId = $data['kind_of_work_id'];
            $category_id = $data['category_id'];
        }

        $list['categories'] = $this->productRepository->getAllSelectables($kindOfWorkId);

        if (!$category_id) {
            $category_id = $list['categories']->pluck('id')->toArray();
        } else {
            $list['category_title'] = $list['categories']->find($category_id)['title'];
        }

        $list['categories'] = $list['categories']->all();
        $list['products'] = $this->productRepository->getAllWithFilters($category_id);

        return $list;
    }
}
