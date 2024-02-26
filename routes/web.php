<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
/*
Routes to products
*/
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/detail/{id}', [ProductsController::class, 'show']);
    Route::post('/add', [ProductsController::class, 'store']);
    Route::post('/update/{id}', [ProductsController::class, 'update']);
    Route::get('/delete/{id}', [ProductsController::class, 'destroy']);
});
/*
Routes to category
*/
Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/add', [CategoryController::class, 'store']);
    Route::get('/detail/{id}', [CategoryController::class, 'show']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);
    Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
});
