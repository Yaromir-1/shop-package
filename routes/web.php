<?php

use Illuminate\Support\Facades\Route;
use Yaromir\ShopPackage\Http\Controllers\CategoryController;
use Yaromir\ShopPackage\Http\Controllers\StorageController;
use Yaromir\ShopPackage\Http\Controllers\ProviderController;

Route::resource('categories', CategoryController::class);
Route::resource('storages', StorageController::class);
Route::resource('providers', ProviderController::class);

