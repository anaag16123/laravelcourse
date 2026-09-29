<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageNotDIController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$basePath = '/';
$aboutPath = 'about';
$contactPath = 'contact';
$productPath = 'products';
$cartPath = 'cart';
$imagePath = 'image';
$imageNotDiPath = 'image-not-di';
$createPath = 'create';
$savePath = 'save';
$addPath = 'add';
$removeAllPath = 'removeAll';
$idPath = '{id}';

Route::get($basePath, [HomeController::class, 'index'])->name('home.index');
Route::get($basePath.$aboutPath, [HomeController::class, 'about'])->name('home.about');
Route::get($basePath.$contactPath, [HomeController::class, 'contact'])->name('home.contact');

Route::get($basePath.$productPath, [ProductController::class, 'index'])->name('product.index');
Route::get($basePath.$productPath.'/'.$createPath, [ProductController::class, 'create'])->name('product.create');
Route::post($basePath.$productPath.'/'.$savePath, [ProductController::class, 'save'])->name('product.save');
Route::get($basePath.$productPath.'/'.$idPath, [ProductController::class, 'show'])->name('product.show')->whereNumber('id');

Route::get($basePath.$cartPath, [CartController::class, 'index'])->name('cart.index');
Route::post($basePath.$cartPath.'/'.$addPath.'/'.$idPath, [CartController::class, 'add'])->name('cart.add')->whereNumber('id');
Route::delete($basePath.$cartPath.'/'.$removeAllPath, [CartController::class, 'removeAll'])->name('cart.removeAll');

Route::get($basePath.$imagePath, [ImageController::class, 'index'])->name('image.index');
Route::post($basePath.$imagePath.'/'.$savePath, [ImageController::class, 'save'])->name('image.save');

Route::get($basePath.$imageNotDiPath, [ImageNotDIController::class, 'index'])->name('imagenotdi.index');
Route::post($basePath.$imageNotDiPath.'/'.$savePath, [ImageNotDIController::class, 'save'])->name('imagenotdi.save');

Auth::routes();
