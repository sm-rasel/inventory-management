<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
});
Route::group([],function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
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
    Route::post('/category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category_delete');

    Route::get('/inventory-index', [InventoryController::class, 'inventoryIndex'])->name('admin.inventory_index');
    Route::post('/inventory-store', [InventoryController::class, 'inventoryStore'])->name('admin.inventory_store');

});

