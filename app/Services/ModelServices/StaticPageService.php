<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\StaticPageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StaticPageService extends BaseModelService
{
    public function __construct(StaticPageRepository $repository)
    {
        parent::__construct($repository);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }

    public function toggle(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = ! $entity['is_toggled'];

        return $this->repository->save($entity);
    }
}
