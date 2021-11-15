<?php

use App\Http\Controllers\Admin\CategotyController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::prefix('categories')->name('categories.')->group(function(){
    Route::get('/', [CategotyController::class, 'index'])->name('index');
});
