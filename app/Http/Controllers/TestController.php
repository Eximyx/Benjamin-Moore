<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function __construct(
        // NewsService $newsService
    ) {
        // parent::__construct($newsService);
    }

    public function create(CreateNewsPostRequest $request)
    {
        $d = NewsPostDTO::AppRequest(
            $request
        );
        return response()->json($d);
    }
}
