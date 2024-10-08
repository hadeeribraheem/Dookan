<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoriesControllerResource;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductsControllerResource;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SellersController;
use App\Http\Controllers\Api\UsersControllerResource;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\DeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'changeLang'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [RegisterController::class, 'register']);
        Route::post('/login', LoginController::class);
    });
    Route::resource('products', ProductsControllerResource::class)
        ->names([
            'index' => 'api.products.index',
            'store' => 'api.products.store',
            'show' => 'api.products.show',
            'update' => 'api.products.update',
            'destroy' => 'api.products.destroy',
        ]);

    Route::middleware('auth:sanctum')->group(function () {

        /******************* admin routes ******************************/
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::put('profile/update-user/{id}',[ProfileController::class,'update_user']);
        Route::resource('users',UsersControllerResource::class);

        /******************* seller routes ******************************/
        Route::get('seller/dashboard', [SellersController::class, 'dashboard']);
        Route::get('seller/users/{sellerId}', [SellersController::class, 'getUsers']);
        Route::get('own/products', [SellersController::class, 'getProducts']);

        // Wishlist routes
        Route::get('/wishlist', [WishlistController::class, 'index']);
        Route::post('/wishlist/store', [WishlistController::class, 'store']);

        // Cart routes
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart/store', [CartController::class, 'store']);

        // Addresses
        Route::get('/profile/address/index', [AddressController::class, 'index']);
        Route::post('/profile/address/store', [AddressController::class, 'store']);
        Route::post('/profile/address/select', [AddressController::class, 'select']);

        // Orders
        Route::post('/order/store', [OrderController::class, 'store']);

        //logout
        Route::get('/logout', [LogoutController::class, 'logout']);

    });
    Route::resources([
        'categories' => CategoriesControllerResource::class,
    ]);
    Route::get('/delete-item', DeleteController::class);

});


