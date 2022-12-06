<?php

namespace App\Http\Services;

use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected Order $model;
    protected Builder $query;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function myOrderList(array $params)
    {
        $page = isset($params['page']) && $params['page'] > 0 ? $params['page'] : 1;
        $perPage = $params['per_page'] ?? 10;
        $skip = ($page - 1) * $perPage - 1;
        $query = $this
            ->model
            ->query();

        $this->orderByUserId($query, Auth::id());

        return [
            'total' => $query->count(),
            'data' => OrderResource::collection($query->skip($skip)->take($perPage)->get()),
            'page' => $page,
            'perPage' => $perPage
        ];
    }

    public function orderByUserId(Builder &$builder, int $userId)
    {
        $builder->where('user_id', $userId);
    }

    public function orderDetail(int $orderId)
    {
        $order = $this->model
            ->query()
            ->find($orderId);

        return new OrderDetailResource($order);
    }
}
