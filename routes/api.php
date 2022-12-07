<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('product', \App\Http\Controllers\Api\ProductController::class)->only(['index', 'show']);
    Route::resource('category', \App\Http\Controllers\Api\CategoryController::class)->only('index');
//    Route::resource('users', \App\Http\Controllers\Api\UserController::class);

    Route::get('my-orders', [\App\Http\Controllers\Api\OrderController::class, 'myOrder']);
    Route::resource('order', \App\Http\Controllers\Api\OrderController::class)->only('show');
});
