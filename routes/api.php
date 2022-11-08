<?php

use App\Http\Controllers\API\Front\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\UserController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//product
route::get('/products/index',[ProductController::class,'index'])->name('products.index')->middleware('auth:api');
route::post('/products/store',[ProductController::class,'store'])->name('products.store')->middleware('auth:api');
route::post('update/{id}',[ProductController::class,'update'])->name('products.update')->middleware('auth:api');
route::get('delete/{id}',[ProductController::class,'delete'])->name('delete')->middleware('auth:api');

//order
route::get('/orders/index',[OrderController::class,'index'])->name('order.index');
route::get('orders/confirm/{id}',[OrderController::class,'confirm'])->name('orders.confirm')->middleware('auth:api');


//user
route::get('/users/index',[UserController::class,'index'])->name('users.index')->middleware('auth:api');
route::post('/admin/profile/store/{id}',[UserController::class,'store'])->name('admin.profile.store')->middleware('auth:api');

//Front

//login
route::post('/login',[UserController::class,'login'])->middleware('auth:api');

//profile
route::get('/user/profile',[ProfileController::class,'index'])->name('profile.index');
route::post('/user/profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');





