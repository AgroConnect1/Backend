<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/products' , ProductController::class);
Route::apiResource('/orders' , OrderController::class);
Route::patch('/orders/{order}/status', OrderStatusController::class);


