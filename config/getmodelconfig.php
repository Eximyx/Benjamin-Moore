<?php

use App\Models\Category;
use App\Models\KindOfWork;
use App\Models\Leads;
use App\Models\NewsPost;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\StaticPage;
use App\Models\User;
use App\Models\UserRoles;

return [
    NewsPost::class => [
        'ModelName' => 'admin.news.title',
        'datatable_data' => [
            'title' => 'Заголовок',
            'is_toggled' => 'Отображение',
            'category_id' => 'Категория',
        ],
        'form_data' => [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Содержимое',
            'category_id' => 'Категория',
            'main_image' => 'Фото',
        ],
        'selectable_key' => 'category_id',
        'selectableModel' => app(Category::class),
    ],
    Category::class => [
        'ModelName' => 'admin.category.title',
        'datatable_data' => [
            'title' => 'Заголовок',
        ],
        'form_data' => [
            'title' => 'Заголовок',
        ],
    ],
    Product::class => [
        'ModelName' => 'Товары',
        'datatable_data' => [
            'title' => 'Заголовок',
            'code' => 'Код',
            'product_category_id' => 'Категория',
            'is_toggled' => 'Отображение',
        ],
        'form_data' => [
            'title' => 'Заголовок',
            'main_image' => 'Фото',
            'content' => 'Характеристика',
            'code' => 'Код',
            'gloss_level' => 'Степень блеска',
            'description' => 'Описание',
            'type' => 'Тип',
            'colors' => 'Цвета',
            'base' => 'Базы',
            'v_of_dry_remain' => 'V сухого остатка',
            'time_to_repeat' => 'Повторное нанесение',
            'consumption' => 'Расход кв.м/гал',
            'thickness' => 'Толщина сухой пленки (милы)',
            'product_category_id' => 'Серия',
        ],
        'selectable_key' => 'product_category_id',
        'selectableModel' => app(ProductCategory::class),
    ],
    ProductCategory::class => [
        'ModelName' => 'Категории продуктов',
        'datatable_data' => [
            'title' => 'Название',
            'kind_of_work_id' => 'Категория',
        ],
        'form_data' => [
            'title' => 'Название',
            'content' => 'Содержимое',
            'kind_of_work_id' => 'Категория',
        ],
        'selectable_key' => 'kind_of_work_id',
        'selectableModel' => app(KindOfWork::class),
    ],
    Leads::class => [
        'ModelName' => 'Обратная связь',
        'datatable_data' => [
            'name' => 'Имя',
            'contactInfo' => 'контактная информация',
            'message' => 'Сообщение',
        ],
        'form_data' => [
            'name' => 'Имя',
            'contactInfo' => 'контактная информация',
            'message' => 'Сообщение',
        ],
    ],
    StaticPage::class => [
        'ModelName' => 'Информация',
        'datatable_data' => [
            'title' => 'Заголовок',
            'is_toggled' => 'Отображение',
        ],
        'form_data' => [
            'title' => 'Заголовок',
            'content' => 'Содержимое',
        ],
    ],
    User::class => [
        'ModelName' => 'Пользователи',
        'datatable_data' => [
            'name' => 'Имя',
            'email' => 'Email',
            'user_role_id' => 'Права',
        ],
        'form_data' => [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
            'user_role_id' => 'Права',
        ],
        'selectable_key' => 'user_role_id',
        'selectableModel' => app(UserRoles::class),
    ],
];
