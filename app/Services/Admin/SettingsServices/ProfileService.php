<?php

namespace App\Services\Admin\SettingsServices;

use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\AdminRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function __construct(
        protected AdminRepository $repository
    )
    {
    }

    /**
     * @param Model $user
     * @param ModelDTO $dto
     * @return Model
     */
    public function update(Model $user, ModelDTO $dto): Model
    {
        return $this->repository->update(
            $user,
            $dto->toArray()
        );
    }

    /**
     * @return Model
     */
    public function getCurrentUser(): Model
    {
        return $this->repository->findById(Auth::id());
    }
}
