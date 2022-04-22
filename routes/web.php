<?php

use Illuminate\Support\Facades\Route;
use Yaromir\ShopPackage\Http\Controllers\CategoryController;
use Yaromir\ShopPackage\Http\Controllers\StorageController;
use Yaromir\ShopPackage\Http\Controllers\ProviderController;
use Yaromir\ShopPackage\Http\Controllers\ClientController;
use Yaromir\ShopPackage\Http\Controllers\ProductController;
use Yaromir\ShopPackage\Http\Controllers\OrderController;

Route::resource('categories', CategoryController::class);
Route::resource('storages', StorageController::class);
Route::resource('providers', ProviderController::class);
Route::resource('clients', ClientController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

