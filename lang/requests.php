<?php
return [
    'AdminRequest' => [
        'id' => 'numeric|nullable',
        'name' => 'string|required|min:2|max:25',
        'email' => 'email|required|min:5|max:50',
        'password' => 'required|min:8',
        'user_role_id' => 'exists:user_roles',
    ],
    'AuthRequest' => [
        'id' => 'numeric|nullable',
        'name' => 'string|required|min:2|max:25',
        'email' => 'email|required|min:5|max:50',
        'password' => 'string|required|min:8|max:30|nullable',
    ],
    'BannerRequest' => [[
        'title' => 'string',
        'content' => 'string',
        'banner_position_id' => 'string|nullable',
        'image' => 'image|nullable',
    ],

    ],
];
