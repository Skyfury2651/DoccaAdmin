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

    public function list (int $paginate = 10)
    {
        $query = $this->model->query();
        $query = $query->with('createdBy', 'updatedBy');
        return $query->paginate($paginate);
    }

    public function store(array $params)
    {
        return $this->model->create([
            'name' => $params['name'],
            'slug' => $params['slug'],
        ]);
    }

    public function find (int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
