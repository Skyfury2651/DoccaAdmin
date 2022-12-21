<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductCategoryService;
use App\Http\Traits\HasResponseApi;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use HasResponseApi;

    public function index(Request $request, ProductCategoryService $productCategoryService)
    {
        try {
            $categories = $productCategoryService->categoryList();

            return $this->apiResponse($categories);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }
}
