<?php

namespace App\Http\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    protected Product $model;
    protected Builder $query;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function productList(array $params)
    {
        $page = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
        $perPage = $params['per_page'] ?? 10;
        $skip = ($page - 1) * $perPage - 1;

        $query = $this
            ->model
            ->query();

        if (isset($params['category_id']) && $params['category_id']) {
            $this->filterByCategoryId($query, $params['category_id']);
        }

        return [
            'total' => $query->count(),
            'data' => ProductResource::collection($query->skip($skip)->take($perPage)->get()),
            'page' => $page,
            'perPage' => $perPage
        ];
    }

    public function filterByCategoryId(Builder &$builder, int $categoryId)
    {
        $builder->where('category_id', $categoryId);
    }

    public function productDetail(int $productId)
    {
        return new ProductResource(
            $this->model
                ->query()
                ->find($productId)
        );
    }
}
