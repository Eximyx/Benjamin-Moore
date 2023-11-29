<?php
namespace App\Services\News;

use App\Models\NewsPost;
class Service{
    public function store($data)
    {
        $post=NewsPost::create($data);
    }

    public function update($newsPost,$data)
    {
        $newsPost->update($data);
    }


}