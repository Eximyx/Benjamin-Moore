<?php
namespace App\Services\News;

use Illuminate\Support\Facades\Storage;
use App\Models\NewsPost;
use Illuminate\Validation\NestedRules;

class Service{
    public function store($data)
    {
        try {
            Storage::put('public\image',$data['main_image']);
        }
        catch (\Exception $exception) {
            abort(404);
        }
        $data['main_image'] = $data['main_image']->hashName();
        $post = NewsPost::create($data);
    }

    public function update($newsPost,$data)
    {
        $newsPost->update($data);
    }


    public function delete_image(NewsPost $newsPost) {
        Storage::delete('public/image/'.$newsPost->main_image);
    }

}
