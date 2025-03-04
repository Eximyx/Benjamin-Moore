<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ReviewRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReviewService extends BaseModelService
{
    /**
     * @param ReviewRepository $repository
     */
    public function __construct(ReviewRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param Request $request
     * @return Model|null
     */
    public function toggle(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }
}
