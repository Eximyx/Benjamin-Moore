<?php

namespace App\Services\SettingsServices;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\DataTransferObjects\ToggleSectionsDTO;
use App\Repositories\SettingRepositories\SectionRepository;
use App\Services\ModelServices\BaseModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SectionService extends BaseModelService
{
    public function __construct(SectionRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(ModelDTO $dto): ?Model
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
    public function destroy(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        if ($entity !== null) {
            if (! isset($entity->section_position_id)) {
                $this->repository->destroy($entity);
            } else {
                throw new Exception('Вы не можете удалить секцию, которая уже используется!', 422);
            }
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

    public function toggle(ToggleSectionsDTO $dto): void
    {
        $dto = (array) $dto;

        $this->uploadFilesForSections($dto['files']);
    }

    /**
     * @param  array<int, UploadedFile|string>  $data
     */
    public function uploadFilesForSections(array $data): void
    {
        foreach ($data as $value) {
            if (! is_string($value)) {
                Storage::putFileAs(
                    'public/image/sections', $value,
                    $value->getClientOriginalName());
            }
        }
    }
}
