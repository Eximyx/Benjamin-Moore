<?php

use App\Models\NewsPost;
use App\Models\Product;
use App\Models\StaticPage;

return [
    StaticPage::class => '/',
    Product::class => '/catalog/',
    NewsPost::class => '/news/',
];
