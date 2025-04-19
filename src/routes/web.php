<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::match(['GET', 'POST'], 'search', [ProductController::class, 'search']);    Route::post('{productId}', [ProductController::class, 'edit']);
    Route::get('register', [ProductController::class, 'create']);
    Route::post('', [ProductController::class, 'store']);
    Route::get('{productId}', [ProductController::class, 'edit']);
    Route::patch('{productId}/update', [ProductController::class, 'update']);
    Route::delete('{productId}/delete', [ProductController::class, 'destroy']);
});
