<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;

Route::get('/', [ArticlesController::class, 'index'])
    ->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index')
        ->middleware('auth');
});

Auth::routes(['register' => false]);

Route::resource('articles', ArticlesController::class);

