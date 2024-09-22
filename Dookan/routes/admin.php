<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\CategoryControllerResource;
use App\Http\Controllers\Web\ProductsControllerResource;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\UserControllerResource;
use Illuminate\Support\Facades\Route;


/** Admin Routes */

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');

/* Admin profile */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::put('profile/update-user/{id}',[ProfileController::class,'update_user'])->name('update.user');

/* Add data */

// (add/edit/delete/show) categories for admin control
/*Route::resource('categories', CategoryControllerResource::class);*/
Route::resources([
    'categories' => CategoryControllerResource::class,
    'products'=>ProductsControllerResource::class,
    'users'=>UserControllerResource::class,
]);
