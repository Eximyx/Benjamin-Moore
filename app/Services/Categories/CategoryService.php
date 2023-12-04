<?php
namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\NestedRules;

class CategoryService{
    public function store($data)
    {
        $post = Category::create($data);
    }

    public function update($category,$data)
    {
        $category->update($data);
    }

}
