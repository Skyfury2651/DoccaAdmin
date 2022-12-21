<?php

use App\Http\Controllers\Web\ProductCategoryController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/product-category', 'list')->name('product.category.list');
        Route::get('/product-category/create', 'create')->name('product.category.create');
        Route::post('/product-category', 'store')->name('product.category.store');
        Route::get('/product-category/{id}', 'edit')->name('product.category.edit');
        Route::patch('/product-category/{id}', 'update')->name('product.category.update');
        Route::delete('/product-category/{id}', 'destroy')->name('product.category.destroy');
    });
});

require __DIR__.'/auth.php';
