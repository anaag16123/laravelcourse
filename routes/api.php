<?php

use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductApiControllerV2;
use App\Http\Controllers\Api\ProductApiControllerV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$basePath = '/';
$userPath = 'user';
$productPath = 'products';
$v2Path = 'v2';
$v3Path = 'v3';
$paginatePath = 'paginate';
$idPath = '{id}';

Route::get($basePath.$userPath, function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get($basePath.$productPath, [ProductApiController::class, 'index'])->name('api.product.index');
Route::get($basePath.$productPath.'/'.$idPath, [ProductApiController::class, 'show'])->name('api.product.show')->whereNumber('id');
Route::post($basePath.$productPath, [ProductApiController::class, 'save'])->name('api.product.save');

Route::get($basePath.$v2Path.'/'.$productPath, [ProductApiControllerV2::class, 'index'])->name('api.v2.product.index');
Route::get($basePath.$v2Path.'/'.$productPath.'/'.$idPath, [ProductApiControllerV2::class, 'show'])->name('api.v2.product.show')->whereNumber('id');

Route::get($basePath.$v3Path.'/'.$productPath, [ProductApiControllerV3::class, 'index'])->name('api.v3.product.index');
Route::get($basePath.$v3Path.'/'.$productPath.'/'.$paginatePath, [ProductApiControllerV3::class, 'paginate'])->name('api.v3.product.paginate');
