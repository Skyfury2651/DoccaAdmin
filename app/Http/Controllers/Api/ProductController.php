<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Http\Traits\HasResponseApi;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HasResponseApi;

    public function index(Request $request, ProductService $productService)
    {
        try {
            $validKeys = ['page', 'per_page', 'category_id'];

            return $this->apiResponse($productService->productList($request->only($validKeys)));
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }

    public function show(Request $request, int $id, ProductService $productService)
    {
        try {
            return $this->apiResponse($productService->productDetail($id));
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }
}
