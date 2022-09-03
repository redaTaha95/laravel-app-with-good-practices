<?php

use App\Http\Controllers\Api\ProductController;


Route::apiResource('products',ProductController::class);

Route::get('/productsByCategory/{category_id}', [ProductController::class, 'filterProductsByCategory'])
    ->where('category_id', '[0-9]+');
