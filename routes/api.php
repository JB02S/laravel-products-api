<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ProductPriceController;

Route::prefix('v1')->group(function() {
    Route::apiResource('/products', ProductController::class);
    Route::patch('/products/{product}/complete', ProductPriceController::class);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

