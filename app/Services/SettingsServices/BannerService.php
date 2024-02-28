<?php

namespace App\Services\SettingsServices;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Services\ModelServices\BaseModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BannerService extends BaseModelService
{
    public function __construct(BannersRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(ModelDTO $dto): ?Model
    {
        $dto = (array)$dto;

        if (!empty($dto['banner_position_id'])) {
            $this->repository->nullPosition($dto['banner_position_id']);
        }

        return $this->repository->create($dto);
    }

    /**
     * @throws Exception
     */
    public function destroy(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        if ($entity !== null) {
            if (!isset($entity->banner_position_id)) {
                $this->repository->destroy($entity);
            } else {
                throw new Exception('Вы не можете удалить баннер, который уже используется!', 422);
            }

        }

        return $entity;
    }

    /**
     * @return array<string, mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }

        return $variables;
    }
}
