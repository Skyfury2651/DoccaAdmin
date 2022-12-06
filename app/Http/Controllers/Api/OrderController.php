<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Http\Traits\HasResponseApi;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use HasResponseApi;

    public function myOrder(Request $request, OrderService $orderService)
    {
        try {
            $validKeys = ['per_page', 'page'];

            return $this->apiResponse($orderService->myOrderList($request->only($validKeys)));
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }

    public function show(Request $request,int $id,OrderService $orderService)
    {
        try {
            return $this->apiResponse($orderService->orderDetail($id));
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }
}
