<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Services\ModelServices\NewsService;

class NewsController extends BaseAdminController
{
    public function __construct(
        NewsService $service,
    )
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, CreateNewsPostRequest::class);
    }
}
