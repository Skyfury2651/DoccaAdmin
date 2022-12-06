<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Http\Traits\HasResponseApi;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HasResponseApi;

    public function index(Request $request, CategoryService $categoryService)
    {
        try {
            $categories = $categoryService->categoryList();

            return $this->apiResponse($categories);
        } catch (\Exception $exception) {
            return $this->apiResponse(null, $exception->getCode(), $exception->getMessage());
        }
    }
}
