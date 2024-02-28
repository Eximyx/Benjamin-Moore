<?php

namespace App\Services;

use App\DataTransferObjects\ModelDTO\ContactsDTO;
use App\Models\Contacts;
use App\Repositories\SettingRepositories\ContactsRepository;

class ContactsService
{
    /**
     * @var array<string,mixed>
     */
    protected array $repositories;

    public function __construct(
        protected ContactsRepository $contactsRepository,
    )
    {
    }

    public function contacts(ContactsDTO $dto): Contacts
    {
        $dto = (array)$dto;

        return $this->contactsRepository->updateOrCreate($dto);
    }

    public function contactsFetch(): ?Contacts
    {
        return $this->contactsRepository->first();
    }
}
