<?php

namespace App\Services\News;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\NestedRules;

class Service
{
    public function news_store($data)
    {
        if (array_key_exists('main_image', $data)) {
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        } else {
            $data['main_image'] = 'default_post.jpg';
        }
        ;

        if (is_string($data['categoriesArr'])) {
            $categories = explode(',', $data['categoriesArr']);
            foreach ($categories as $item) {
                Category::create([
                    'title' => $item
                ]);
            }
        }
        unset($data['categoriesArr']);
        return $data;
    }

    public function update($newsPost, $data)
    {
        if (array_key_exists('main_image', $data)) {
            $this->delete_image($newsPost);
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        }
        ;
        $newsPost->update($data);
    }

    public function delete_image($newsPost)
    {
        if (!($newsPost->main_image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $newsPost->main_image);
        }
        return $newsPost;
    }

}
