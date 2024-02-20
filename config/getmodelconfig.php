<?php

use App\Models\Category;
use App\Models\KindOfWork;
use App\Models\Leads;
use App\Models\NewsPost;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\StaticPage;
use App\Models\User;
use App\Models\UserRoles;

return [
    NewsPost::class => [
        'ModelName' => 'admin.titles.news',
        'datatable_data' => [
            'title',
            'is_toggled',
            'category_id',
        ],
        'form_data' => [
            'title',
            'description',
            'content',
            'category_id',
            'main_image',
        ],
        'selectable_key' => 'category_id',
        'selectableModel' => app(Category::class),
    ],

    Category::class => [
        'ModelName' => 'admin.titles.category',
        'datatable_data' => [
            'title',
        ],
        'form_data' => [
            'title',
        ],
    ],

    Product::class => [
        'ModelName' => 'admin.titles.product',
        'datatable_data' => [
            'title',
            'code',
            'product_category_id',
            'is_toggled',
        ],
        'form_data' => [
            'title',
            'main_image',
            'content',
            'code',
            'gloss_level',
            'description',
            'type',
            'colors',
            'base',
            'v_of_dry_remain',
            'time_to_repeat',
            'consumption',
            'thickness',
            'product_category_id',
        ],
        'selectable_key' => 'product_category_id',
        'selectableModel' => app(ProductCategory::class),
    ],

    ProductCategory::class => [
        'ModelName' => 'admin.titles.productCategory',
        'datatable_data' => [
            'title',
            'kind_of_work_id',
        ],
        'form_data' => [
            'title',
            'content',
            'kind_of_work_id',
        ],
        'selectable_key' => 'kind_of_work_id',
        'selectableModel' => app(KindOfWork::class),
    ],

    Leads::class => [
        'ModelName' => 'admin.titles.leads',
        'datatable_data' => [
            'name',
            'contactInfo',
            'message',
        ],
        'form_data' => [
            'name',
            'contactInfo',
            'message',
        ],
    ],

    StaticPage::class => [
        'ModelName' => 'admin.titles.staticPage',
        'datatable_data' => [
            'title',
            'is_toggled',
        ],
        'form_data' => [
            'title',
            'content',
        ],
    ],

    User::class => [
        'ModelName' => 'admin.titles.user',
        'datatable_data' => [
            'name',
            'email',
            'user_role_id',
        ],
        'form_data' => [
            'name',
            'email',
            'password',
            'user_role_id',
        ],
        'selectable_key' => 'user_role_id',
        'selectableModel' => app(UserRoles::class),
    ],

    Review::class => [
        'ModelName' => 'admin.titles.review',
        'datatable_data' => [
            'title',
            'description',
            'is_toggled',
        ],
        'form_data' => [
            'title',
            'description',
            'main_image',
        ],
    ],
];

