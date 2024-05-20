<?php

namespace App\Services\Admin\ModelServices;

use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\SectionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\DataTables\Exceptions\Exception;

class SectionService extends BaseModelService
{
    public function __construct(SectionRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param ModelDTO $dto
     * @return Model
     */
    public function create(ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if (!empty($data['section_position_id'])) {
            $this->repository->nullPosition($data['section_position_id']);
        }

        return $this->repository->create($data);
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if (!isset($entity->section_position_id)) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.sections.position'), 422);
        }

        return $entity;
    }

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $data = $dto->toArray();
        throw new Exception($entity["section_position_id"], 422);
        if (!empty($data['section_position_id']) && $entity->section_position_id != $dto->section_position_id) {
            $this->repository->nullPosition($data['section_position_id']);
        }

        return $this->repository->update(
            $entity,
            $data
        );
    }

    /**
     * @return array|mixed[]
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
