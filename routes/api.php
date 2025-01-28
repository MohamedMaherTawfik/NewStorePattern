<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoreyController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\admin\marketPlaceController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\orders\cartController;
use App\Http\Controllers\orders\OrderController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
});

Route::controller(marketPlaceController::class)->group(function ($router) {
    Route::get('/dashboard', 'index');
    Route::get('/dashboard/{id}', 'show');
    Route::post('/dashboard', 'store');
    Route::post('/dashboard/{id}', 'update');
    Route::delete('/dashboard/{id}', 'destroy');
});

Route::controller(categoreyController::class)->group(function ($router) {
    Route::get('/categories', 'index');
    Route::get('/category/{id}', 'show');
    Route::post('/category', 'store');
    Route::post('/category/{id}', 'update');
    Route::delete('/category/{id}', 'destroy');
});

Route::controller(brandController::class)->group(function ($router) {
    Route::get('/brands', 'index');
    Route::get('/brand/{id}', 'show');
    Route::post('/brand', 'store');
    Route::post('/brand/{id}', 'update');
    Route::delete('/brand/{id}', 'destroy');
});

Route::controller(productController::class)->group(function ($router) {
    Route::get('/products', 'index');
    Route::get('/product/{id}', 'show');
    Route::post('/product', 'store');
    Route::post('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');
});

Route::controller(cartController::class)->group(function ($router) {
    Route::post('/cart', 'add_to_cart');
    Route::get('/cart', 'get_cart');
    Route::delete('/cart', 'remove_from_cart');
    Route::delete('/cart', 'clear_cart');
});


Route::controller(OrderController::class)->group(function ($router) {
    Route::post('/order', 'create_order');
    Route::get('/orders', 'get_user_orders');
    Route::get('/orders', 'all_orders');
    Route::get('/order/{id}', 'get_order');
    Route::post('/order/{id}', 'change_order_status');
    Route::delete('/order/{id}', 'delete_order');
});
