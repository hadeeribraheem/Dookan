<?php



/** Vendor Routes */

use App\Http\Controllers\Web\ProductsControllerResource;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\SellerController;
use App\Http\Controllers\Web\UserControllerResource;
use Illuminate\Support\Facades\Route;

/* Seller profile */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::put('profile/update-user/{id}',[ProfileController::class,'update_user'])->name('update.user');

/* Add data */

Route::resources([
    'products'=>ProductsControllerResource::class,
]);

Route::get('dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
Route::get('users/{sellerId}', [SellerController::class, 'getUsers'])->name('users');
Route::get('own/products', [SellerController::class, 'getProducts'])->name('own-products');
