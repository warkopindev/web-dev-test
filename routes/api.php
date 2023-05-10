<?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\PosterController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user/update', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    // seller
    #buka toko
    Route::post('store', [StoreController::class, 'store']);
    Route::get('shipping', [StoreController::class, 'all']);
    Route::get('fetch', [StoreController::class, 'fetch']);

    // product
    Route::post('store/{id}/products', [ProductController::class, 'store']);
    Route::post('product/{id}/photo', [ProductController::class, 'updatePhoto']);
    Route::get('stores/{store_id}/product', [ProductController::class, 'productByStore']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);