<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('shop/{category_id?}', [HomeController::class, 'shop'])->name('shop');

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/order', [CartController::class, 'placeOrder'])->name('order.place');
Route::get('/thankyou', [CartController::class, 'thankyou'])->name('thankyou');

