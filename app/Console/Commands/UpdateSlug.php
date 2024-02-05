<?php

namespace App\Console\Commands;

use App\Models\NewsPost;
use App\Models\StaticPage;
use App\Models\Product;

use Illuminate\Console\Command;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UpdateSlug extends Command
{
    protected $signature = 'app:update-slug';

    protected $description = 'Updating the slug of all existing entities that contain it';

    protected $arrayOfSluggableModels;
    public function __construct()
    {
        parent::__construct();
        $this->arrayOfSluggableModels = [
            new NewsPost(),
            new Product(),
            new StaticPage(),
        ];
    }

    public function handle()
    {
        foreach ($this->arrayOfSluggableModels as $model) {
            $entities = $model->all();
            foreach ($entities as $entity) {
                $entity->slug = SlugService::createSlug($model::class, 'slug', $entity->title);
                $this->info($entity->slug);
                $entity->save();
            }
        }
    }
}
