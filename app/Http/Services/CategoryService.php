<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Database\Query\Builder;

class CategoryService
{
    protected Category $model;
    protected Builder $query;

    public function __construct(Category $category)
    {
        $this->model = $category;

    }

    public function categoryList() {
        $query = $this
            ->model
            ->query();

        return [
            'data' => $query->get(),
            'total' => $query->count(),
        ];
    }
}
