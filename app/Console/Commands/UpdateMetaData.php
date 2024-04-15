<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Console\Commands;

use App\Models\MetaData;
use App\Models\NewsPost;
use App\Models\Product;
use App\Models\StaticPage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class UpdateMetaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-meta-data';

    /**
     * @var array|string[]
     */
    protected array $entities = [
        'news' => NewsPost::class,
        'catalog' => Product::class,
        '{slug}' => StaticPage::class,
    ];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding meta-data for all routes';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DB::table('meta_data')->truncate();
        $host = Request::getScheme() . "://" . (Config::get("app.domain") ?? Request::getHost() . ":" . Request::getPort());

        $routeCollection = Route::getRoutes()->get();
        foreach ($routeCollection as $value) {
            $name = $value->getName();
            $uri = $value->uri();
            if ((str_contains($name, 'user')) & (!str_contains($uri, 'admin')) & ($value->methods()[0] == 'GET')) {
                if (str_contains($uri, 'slug')) {
                    $key = explode('/', $uri);
                    if (isset($this->entities[$key[0]])) {
                        foreach ($this->entities[$key[0]]::all() as $item) {
                            if ($key[0] == 'catalog') {
                                $this->info($item->slug);
                            }
                            MetaData::factory()->create([
                                'url' => str_replace('{slug}', $item->slug, $host . '/' . $uri),
                                'title' => $item->title,
                            ]);
                        }
                    }
                    continue;
                }
                MetaData::factory()->create(
                    [
                        'url' => ($uri === '/' ? $host : $host . '/') . $uri,
                        'title' => __($value->getName()),
                    ]
                );
            }
        }
    }
}
