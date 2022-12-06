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
        $validKeys = ['page', 'per_page', 'category_id'];

        return $this->apiResponse($productService->productList($request->only($validKeys)));
    }

    public function show(Request $request,int $id, ProductService $productService) {
        return $this->apiResponse($productService->productDetail($id));
    }
}
