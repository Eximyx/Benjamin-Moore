<?php

use App\Models\Banner;
use App\Models\BannerPosition;
use App\Models\Category;
use App\Models\Color;
use App\Models\KindOfWork;
use App\Models\Leads;
use App\Models\MetaData;
use App\Models\NewsPost;
use App\Models\Partners;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Section;
use App\Models\SectionPosition;
use App\Models\StaticPage;
use App\Models\User;
use App\Models\UserRoles;

return [
    // TODO: Переделать базовый сервис/репозиторий, они не должны знать о различиях между сущностями. Некоторые сущности содержат отношения.  BaseModelService->getVariablesForDataTable()
    Partners::class => [
        'ModelName' => 'admin.titles.partners',
        'datatable_data' => [
            'id',
            'title',
            'location',
        ],
        'form_data' => [
            'title',
            'location',
        ],
    ],
    NewsPost::class => [
        'ModelName' => 'admin.titles.news',
        'datatable_data' => [
            'id',
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
    Banner::class => [
        'ModelName' => 'admin.titles.banners',
        'datatable_data' => [
            'id',
            'title',
            'content',
            'banner_position_id',
        ],
        'form_data' => [
            'title',
            'content',
            'banner_position_id',
            'main_image',
        ],
        'selectable_key' => 'banner_position_id',
        'selectableModel' => app(BannerPosition::class),
    ],

    Section::class => [
        'ModelName' => 'admin.titles.sections',
        'datatable_data' => [
            'id',
            'title',
            'content',
            'section_position_id',
        ],
        'form_data' => [
            'title',
            'section_position_id',
            'content',
        ],
        'selectable_key' => 'section_position_id',
        'selectableModel' => app(SectionPosition::class),
    ],

    Product::class => [
        'ModelName' => 'admin.titles.product',
        'datatable_data' => [
            'id',
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
            'price',
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
        'tagsModel' => app(Color::class),
    ], // DONE

    MetaData::class => [
        'ModelName' => 'admin.titles.metadata',
        'datatable_data' => [
            'url',
            'title',
            'meta_description',
            'meta_keywords',
            'h',
            'additional_text',
        ],
        'form_data' => [
            'url',
            'title',
            'meta_description',
            'meta_keywords',
            'h',
            'additional_text',
        ],
    ],
    ProductCategory::class => [
        'ModelName' => 'admin.titles.productCategory',
        'datatable_data' => [
            'id',
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
    User::class => [
        'ModelName' => 'admin.titles.user',
        'datatable_data' => [
            'id',
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

    Category::class => [
        'ModelName' => 'admin.titles.category',
        'datatable_data' => [
            'id',
            'title',
        ],
        'form_data' => [
            'title',
        ],
    ],
    Leads::class => [
        'ModelName' => 'admin.titles.leads',
        'datatable_data' => [
            'id',
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
            'id',
            'title',
            'is_toggled',
        ],
        'form_data' => [
            'title',
            'content',
        ],
    ],
    Review::class => [
        'ModelName' => 'admin.titles.review',
        'datatable_data' => [
            'id',
            'name',
            'description',
            'is_toggled',
        ],
        'form_data' => [
            'name',
            'description',
            'main_image',
        ],
    ],
    Color::class => [
        'ModelName' => 'admin.titles.color',
        'datatable_data' => [
            'id',
            'title',
            'hex_code',
        ],
        'form_data' => [
            'title',
            'hex_code',
        ],
    ],
];
