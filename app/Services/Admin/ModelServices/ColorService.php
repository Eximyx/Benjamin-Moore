<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ColorRepository;
use App\Traits\ColorTrait;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ColorService extends BaseModelService
{
    use ColorTrait;

    /**
     * @param ColorRepository $repository
     */
    public function __construct(
        ColorRepository $repository,
    )
    {
        parent::__construct($repository);
    }

    /**
     * @return Collection<int, Model>
     */
    public function getOrderedByHexColor(): Collection
    {
        $colors = $this->sortColors($this->getAll());

        return Collection::make($colors);
    }

    /**
     * @return Collection<int, Model>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if ($entity->products()->count() === 0) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.products.colors'), 422);
        }

        return $entity;
    }
}
