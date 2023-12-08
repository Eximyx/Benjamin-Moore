<?php

namespace App\Services\News;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\NewsPost;
use Illuminate\Validation\NestedRules;

class Service
{
    public function store($data)
    {

        if (array_key_exists('main_image', $data)) {
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        } else {
            $data['main_image'] = 'default_post.jpg';
        };

        if (array_key_exists('categoriesArr', $data)) {
            $categories = explode(',', $data['categoriesArr']);
            foreach ($categories as $item) {
                Category::create([
                    'title' => $item
                ]);
            }
            unset($data['categoriesArr']);
        }
        $post = NewsPost::create($data);
    }

    public function news_store($data)
    {
        if (array_key_exists('main_image', $data)) {
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        } else {
            $data['main_image'] = 'default_post.jpg';
        };

        if (array_key_exists('categoriesArr', $data)) {
            $categories = explode(',', $data['categoriesArr']);
            foreach ($categories as $item) {
                Category::create([
                    'title' => $item
                ]);
            }
            unset($data['categoriesArr']);
        }
        return $data;
//        $post = NewsPost::create($data);
    }

    public function update($newsPost, $data)
    {
        if (array_key_exists('main_image', $data)) {
            $this->delete_image($newsPost);
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        };
        $newsPost->update($data);
    }


    public
    function delete_image(NewsPost $newsPost)
    {
        if (!($newsPost->main_image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $newsPost->main_image);
        }
    }

}
