<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ColorRepository;
use App\Repositories\ModelRepositories\MetaDataRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ColorService extends BaseModelService
{
    public function __construct(
        protected MetaDataRepository $metaDataRepository,
        ColorRepository              $repository,
    )
    {
        parent::__construct($repository);
    }

    public function metaDataFindByURL(): ?Model
    {
        return $this->metaDataRepository->findByUrl(
            request()->url()
        );
    }

    /**
     * @return Collection<int, Model>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

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
