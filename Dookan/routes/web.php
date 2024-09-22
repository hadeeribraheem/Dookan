<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\LogoutController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group(['middleware' => 'changeLang'], function () {

    Route::get('/', function () {
        return view('Home.home');
    })->name('home');

    Route::group(['prefix' => 'auth'], function () {
        // --------- start of register --------------
        Route::get('/', [RegisterController::class, 'index'])
            ->name('register');
        Route::post('/register-post', [RegisterController::class, 'save'])
            ->name('auth.register');
        // --------- end of register ----------------

        // --------- start of login -----------------
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login-post', [LoginController::class, 'save'])
            ->name('auth.login');
        // --------- end of login -------------------
    });
    Route::get('/logout',[LogoutController::class,'logout_system'])->name('logout');


    Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
    Route::post('admin/login-post', [AdminController::class, 'save'])
        ->name('admin.auth.login');
});

Route::get('/delete-item', DeleteController::class)->name('delete.item');















/*// Product Management (similar to users)
Route::get('/products', [AdminController::class, 'products'])->name('products');
Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('products.delete');

// Order Management (similar to users)
Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
Route::delete('/orders/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete');*/
