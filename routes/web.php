<?php

// use App\Http\Controllers\AdminUserController;
// use App\Http\Controllers\DashboardController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::get('/', function () {
//     return view('welcome');
// });



require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    // Route::prefix('/admin')->group(function(){

        // Route::group(['prefix' => 'admin'],function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');


route::view('/master','layouts.master');
route::view('/sidebar','layouts.sidebar');
// route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//products
route::get('/products/create',[ProductController::class,'create'])->name('products.create');
route::post('/products/store',[ProductController::class,'store'])->name('products.store');
route::get('/products/index',[ProductController::class,'index'])->name('products.index');
route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
route::post('update/{id}',[ProductController::class,'update'])->name('update');
route::get('delete/{id}',[ProductController::class,'delete'])->name('delete');
route::get('detail/{id}',[ProductController::class,'detail'])->name('products.detail');

//orders
route::get('/orders/index',[OrderController::class,'index'])->name('order.index');
route::get('orders/confirm/{id}',[OrderController::class,'confirm'])->name('orders.confirm');
route::get('orders/prnding/{id}',[OrderController::class,'pending'])->name('orders.pending');
route::get('/orders/detail/{id}',[OrderController::class,'show'])->name('orders.detail');

//User
route::get('/users/index',[UserController::class,'index'])->name('users.index');
route::get('/users/detail/{id}',[UserController::class,'detail'])->name('users.detail');
route::get('/admin/profile',[UserController::class,'profile'])->name('admin.profile');
route::post('/admin/profile/store',[UserController::class,'store'])->name('admin.profile.store');

//Fornt

route::get('/',[FrontController::class,'index'])->name('front.index');



// });
// });
});


