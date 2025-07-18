<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Change this route to use the ProductController index method
Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
