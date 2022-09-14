<?php

// use App\Http\Controllers\AdminUserController;
// use App\Http\Controllers\DashboardController;

// use App\Http\Controllers\Front\FrontController;

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\RegisterController;
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
route::get('edit/{id}',[ProductController::class,'edit'])->name('products.edit');
route::post('update/{id}',[ProductController::class,'update'])->name('products.update');
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

// route::get('/cart/index',[FrontController::class,'index'])->name('cart.index');






// });
// });
});

// route::get('/cart/index',[FrontController::class,'index'])->name('cart.index');

route::get('/',[HomeController::class,'index'])->name('cart');



//Register
route::get('/user/register',[RegisterController::class,'register'])->name('user.register');
route::post('/user/store',[RegisterController::class,'store'])->name('user.store');
//Login


route::get('/user/login',[LoginController::class,'login'])->name('user.login');
route::post('/user/login/store',[LoginController::class,'store'])->name('login.store');
route::get('/user/logout',[LoginController::class,'logout'])->name('user.logout');


//profile
route::get('/user/profile',[ProfileController::class,'index'])->name('profile.index');
route::get('/user/profile/details/{id}',[ProfileController::class,'details'])->name('profile.details');
route::get('/user/profile/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
route::post('/user/profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');






route::get('/cart',[CartController::class,'index'])->name('cart.index');

route::post('/front/index/store',[CartController::class,'store'])->name('cart.store');

route::get('/cart/empty',[CartController::class,'empty'])->name('cart.empty');




