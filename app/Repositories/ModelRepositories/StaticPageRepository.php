<?php

namespace App\Repositories\ModelRepositories;

use App\Models\StaticPage;
use Illuminate\Database\Eloquent\Model;

class StaticPageRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(StaticPage::class);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }
}
