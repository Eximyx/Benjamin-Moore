<?php

namespace App\Services;

use App\DataTransferObjects\ModelDTO\ContactsDTO;
use App\Models\Contacts;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Repositories\SettingRepositories\ContactsRepository;
use App\Repositories\SettingRepositories\SectionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
    }

    /**
     * @return Collection<int,Model>
     */
    public function getSections(): Collection
    {
        return $this->sectionRepository->getLatest()->get();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getBanners(): Collection
    {
        return $this->bannersRepository->getLatest()->get();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getActiveSections(): Collection
    {
        return $this->sectionRepository->getActive()->get();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getActiveBanners(): Collection
    {
        return $this->bannersRepository->getActive()->get();
    }

    public function contacts(ContactsDTO $dto): Contacts
    {
        $dto = (array) $dto;

        return $this->contactsRepository->updateOrCreate($dto);
    }

    public function contactsFetch(): ?Contacts
    {
        return $this->contactsRepository->first();
    }
}
