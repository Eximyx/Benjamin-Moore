<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\CategoryRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryService extends BaseModelService
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if ($entity->posts()->count() === 0) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.news.categories'), 422);
        }

        return $entity;
    }
}
