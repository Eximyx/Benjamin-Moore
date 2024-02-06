<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Models\NewsPost;
use App\Services\NewsService;
use App\DataTransferObjects\NewsPostDTO;

class NewsController extends FakeController
{
    public function __construct(
        NewsService $service,
    ) {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, CreateNewsPostRequest::class);
    }

}
