<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InventoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([],function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::post('/register', [AuthController::class, 'register'])->name('user_login');
    Route::post('/login', [AuthController::class, 'login'])->name('user_login');
});
Route::group(['prefix' => 'inventory'], function (){

    Route::get('/product-index', [ProductController::class, 'productIndex'])->name('admin.product_index');
    Route::post('/product-store', [ProductController::class, 'productStore'])->name('admin.product_store');
    Route::post('/product-update/{id}', [ProductController::class, 'productUpdate'])->name('admin.product_update');
    Route::post('/product-status-update/{id}', [ProductController::class, 'productStatusUpdate'])->name('admin.product_status_update');
    Route::delete('/product-delete/{id}', [ProductController::class, 'productDelete'])->name('admin.product_delete');

    Route::get('/category-index', [CategoryController::class, 'categoryIndex'])->name('admin.category_index');
    Route::post('/category-store', [CategoryController::class, 'categoryStore'])->name('admin.category_store');
    Route::post('/category-update/{id}', [CategoryController::class, 'categoryUpdate'])->name('admin.category_update');
    Route::post('/category-status-update/{id}', [CategoryController::class, 'categoryStatusUpdate'])->name('admin.category_status_update');
    Route::delete('/category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category_delete');

    Route::get('/inventory-index', [InventoryController::class, 'inventoryIndex'])->name('admin.inventory_index');
    Route::post('/inventory-store', [InventoryController::class, 'inventoryStore'])->name('admin.inventory_store');

});
