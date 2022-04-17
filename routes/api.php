<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    ProductController,
    HistoryController,
};

Route::apiResource('product', ProductController::class)->except(['show', 'destroy']);
Route::apiResource('history', HistoryController::class)->only(['store']);