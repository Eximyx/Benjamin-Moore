<?php

namespace App\Services;

use App\Actions\WrapItems;
use App\Repositories\LeadsRepository;
use App\Repositories\NewsRepository;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class MainService
{

    public function __construct(
        protected NewsRepository    $newsRepository,
        protected ProductRepository $productRepository,
        protected LeadsRepository   $leadsRepository,
        protected WrapItems         $wrapItems
    )
    {

    }

    /**
     * @param int|null $amountOfNews
     * @return LengthAwarePaginator<Model>
     */
    public function showNews(int $amountOfNews = null): LengthAwarePaginator
    {
        return $this->newsRepository->getLatest($amountOfNews)->paginate($amountOfNews);
    }

    /**
     * @param int $amountOfProducts
     * @return array<array<Model>>
     */
    public function productsWrapper(int $amountOfProducts = 4): array
    {
        $items = $this->productRepository->getLatest()->get();

        return $this->wrapItems->__invoke($items, $amountOfProducts);
    }

    public function findProductBySlug(string $slug): Model
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function findNewsBySlug(string $slug): Model
    {
        return $this->newsRepository->findBySlug($slug);
    }

    public function leadsCreate(Request $request): Model
    {
        /** @var Request $request */
        return $this->leadsRepository->create($request);
    }

    /**
     * @param array<mixed|array>|null $data
     * @return array<mixed|array>
     */
    public function fetchProducts(array $data = null): array
    {
        $list['category_title'] = null;
        $kind_of_work_id = null;
        $category_id = null;

        if ($data) {
            $kind_of_work_id = $data['kind_of_work_id'];
            $category_id = $data['category_id'];
        }

        $list['categories'] = $this->productRepository->getAllSelectables($kind_of_work_id);

        if (!$category_id) {
            $category_id = $list['categories']->pluck('id')->toArray();
        } else {
            $list['category_title'] = $list['categories']->find($category_id)->title;
        }

        $list['categories'] = $list['categories']->get();
        $list['products'] = $this->productRepository->getAllWithFilters($category_id);

        return $list;
    }
}
