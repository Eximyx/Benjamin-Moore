<?php

namespace App\Services;

use App\DataTransferObjects\ToggleableSettingsDTO;
use App\Http\Requests\ToggleableRequest;
use App\Models\Banner;
use App\Models\Contacts;
use App\Models\Section;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Repositories\SettingRepositories\ContactsRepository;
use App\Repositories\SettingRepositories\SectionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SettingsService
{
    /**
     * @var array<string,mixed>
     */
    protected array $repositories;

    public function __construct(
        protected ContactsRepository $contactsRepository,
        protected SectionRepository $sectionRepository,
        protected BannersRepository $bannersRepository,

    ) {
        $this->repositories = [
            'about-us' => $this->sectionRepository,
            'banners' => $this->bannersRepository,
        ];
    }

    /**
     * @return Collection<int,Section>
     */
    public function getSections(): Collection
    {
        return $this->sectionRepository->getSections();
    }

    /**
     * @return Collection<int,Banner>
     */
    public function getBanners(): Collection
    {
        return $this->bannersRepository->getBanners();
    }

    /**
     * @return Collection<int,Section>
     */
    public function getActiveSections(): Collection
    {
        return $this->sectionRepository->getActive();
    }

    /**
     * @return Collection<int,Banner>
     */
    public function getActiveBanners(): Collection
    {
        return $this->bannersRepository->getActive();
    }

    public function toggle(ToggleableRequest $request): mixed
    {
        $dto = ToggleableSettingsDTO::appRequest($request);

        if ($dto->tab_id === 'about-us') {
            $this->uploadFilesForSections($dto->files);
        }
        $result = $this->repositories[$dto->tab_id]->nullPosition();

        if ($result) {
            $result = $this->repositories[$dto->tab_id]->toggle($dto->active_items);
        }

        return $result;
    }

    /**
     * @param  array<string,mixed>  $data
     */
    public function update(string $tab_id, array $data): mixed
    {
        return $this->repositories[$tab_id]->update($data);
    }

    /**
     * @param  array<string,mixed>  $data
     */
    public function delete(array $data): Section|Banner|null
    {
        $repository = $this->repositories[$data['tab_id']];

        $entity = $repository->findById($data['id']);

        if ($entity !== null) {
            $entity = $repository->delete($entity);
        }

        return $entity;
    }

    /**
     * @param  array<string,mixed>  $data
     */
    public function settingsSet(array $data): Contacts
    {
        return $this->contactsRepository->updateOrCreate($data);
    }

    /**
     * @param  array<int, UploadedFile>  $data
     */
    public function uploadFilesForSections(array $data): void
    {
        foreach ($data as $value) {
            Storage::putFileAs(
                'public/image/sections', $value,
                'section_image_'.$value->getClientOriginalName().'.'.'jpg');
        }
    }
}
