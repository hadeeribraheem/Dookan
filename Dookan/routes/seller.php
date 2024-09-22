<?php



/** Vendor Routes */

use App\Http\Controllers\Web\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [SellerController::class, 'dashboard'])->name('dashbaord');
