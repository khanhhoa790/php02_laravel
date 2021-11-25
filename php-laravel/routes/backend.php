<?php

use App\Http\Controllers\Admin\CategotyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::prefix('categories')->name('categories.')->group(function(){
    Route::get('/', [CategotyController::class, 'index'])->name('index');
    Route::get('/{id}/show', [CategotyController::class, 'show'])->name('show');
    Route::get('/create', [CategotyController::class, 'create'])->name('create');
    Route::get('/data', [CategotyController::class, 'data'])->name('data');
    Route::post('/create', [CategotyController::class, 'store'])->name('store');
    Route::get('/{id}edit', [CategotyController::class, 'edit'])->name('edit');
    Route::put('/{id}edit', [CategotyController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategotyController::class, 'destroy'])->name('delete');
});
Route::prefix('products')->name('products.')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [CategotyController::class, 'store'])->name('store');
    // Route::get('/{id}edit', [CategotyController::class, 'edit'])->name('edit');
    // Route::put('/{id}edit', [CategotyController::class, 'update'])->name('update');
    // Route::delete('/{id}', [CategotyController::class, 'destroy'])->name('delete');
});
  
