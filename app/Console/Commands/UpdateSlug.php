<?php

namespace App\Console\Commands;

use App\Models\NewsPost;
use App\Models\StaticPage;
use App\Models\Product;
use App\Models\ProductCategory;

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
        $staticPages = StaticPage::all();
        $staticPages->each(function(StaticPage $staticPage){
            $staticPage->slug = SlugService::createSlug(StaticPage::class, 'slug', $staticPage->title);
            $this->info($staticPage->slug);
            $staticPage->save();
        });
        $products = Product::all();
        $products->each(function(Product $product){
            $product->slug = SlugService::createSlug(Product::class, 'slug', $product->title);
            $this->info($product->slug);
            $product->save();
        });
        $product_categories = ProductCategory::all();
        $product_categories->each(function(ProductCategory $product_category){
            $product_category->slug = SlugService::createSlug(ProductCategory::class, 'slug', $product_category->title);
            $this->info($product_category->slug);
            $product_category->save();
        });
    }
}
