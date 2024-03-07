<?php

namespace App\Services\SettingsServices;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Repositories\SettingRepositories\SectionRepository;
use App\Services\ModelServices\BaseModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SectionService extends BaseModelService
{
    public function __construct(SectionRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(ModelDTO $dto): Model
    {
        $dto = (array) $dto;

        if (! empty($dto['section_position_id'])) {
            $this->repository->nullPosition($dto['section_position_id']);
        }

        return $this->repository->create($dto);
    }

    /**
     * @throws Exception
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if (! isset($entity->section_position_id)) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.sections.position'), 422);
        }

        return $entity;
    }

    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }

        return $variables;
    }
}
