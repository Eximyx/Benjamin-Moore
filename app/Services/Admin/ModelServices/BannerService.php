<?php

namespace App\Services\Admin\ModelServices;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\BannersRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerService extends BaseModelService
{
    public function __construct(BannersRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if (!empty($data['banner_position_id'])) {
            $this->repository->nullPosition($data['banner_position_id']);
        }

        $entity = $this->repository->create($data);

        $entity['image'] = $this->uploadImage($data['image'], $entity['id']);

        return $this->repository->save($entity);
    }

    protected function deleteImage(string $image): bool
    {
        if (!($image === 'default_post.jpg')) {
            Storage::delete('public/image/' . $image);
        }

        return true;
    }

    protected function uploadImage(mixed $image, string $id): string
    {
        $path = 'image/banners/' . $id . '/';

        if ($image !== null & !is_string($image)) {
            Storage::put('public/' . $path, $image);
            $image = 'storage/' . $path . $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if (!empty($data['banner_position_id'])) {
            $this->repository->nullPosition($data['banner_position_id']);
        }

        if ($data['image']) {
            $deleted = $this->deleteImage($entity['image']);
            if ($deleted) {
                $data['image'] = $this->uploadImage($data['image'], $entity['id']);
            }
        } else {
            $data['image'] = $entity['image'];
        }

        return $this->repository->update(
            $entity,
            $data
        );
    }

    /**
     * @throws Exception
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if (!isset($entity->banner_position_id)) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.banners.position'), 422);
        }

        return $entity;
    }

    /**
     * @return array<string, mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        $variables['selectable'] = $variables['data']['selectableModel']->all();

        return $variables;
    }
}
