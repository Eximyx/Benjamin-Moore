<?php

namespace App\Console\Commands;

use App\Models\NewsPost;
use Illuminate\Console\Command;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UpdateSlug extends Command
{
    protected $signature = 'app:update-slug';

    protected $description = 'Command description';

    public function handle()
    {
        $newsPosts = NewsPost::all();
        $newsPosts->each(function(NewsPost $newsPost){
            $newsPost->slug = SlugService::createSlug(NewsPost::class, 'slug', $newsPost->title);
            $this->info($newsPost->slug);
            $newsPost->save();
        });
    }
}
