<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use Illuminate\Routing\Controller;

// NewsPostDTO
// use App\DataTransferObjects\NewsPostDTO;
class TestController extends Controller
{
    public function __construct(
        // NewsService $newsService
    ) {
        // parent::__construct($newsService);
    }

    public function create(CreateNewsPostRequest $request)
    {
        $d = NewsPostDTO::AppRequest($request->replace(
            [
                'title' => 'string|nullable',
                'description' => 'string|nullable',
                'category_id' => 'string|nullable',
                'content' => 'string|nullable',
                'main_image' => 'image|mimes:jpeg,png,jpg|nullable',
                '' => 'image|mimes:jpeg,png,jpg|nullable'
            ]
        )
        );
        return response()->json($d);
    }
}
