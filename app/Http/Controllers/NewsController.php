<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Services\ModelServices\NewsServiceBase;

class NewsController extends BaseAdminController
{
    public function __construct(
        NewsServiceBase $service,
    )
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, CreateNewsPostRequest::class);
    }
}
