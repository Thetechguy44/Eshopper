<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SubsubcategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\FrontendController;
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

Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();

// route for home
Route::resource('home', DashboardController::class);



Route::prefix('admin')->middleware('auth')->group(function(){

//all route for profile
Route::resource('profile', ProfileController::class);
//route for products
Route::resource('users', UsersController::class);
//route for roles
Route::resource('roles', RolesController::class);
//route for products
Route::resource('product', ProductsController::class);
//all route category
Route::resource('category', CategoryController::class);
//route for subcategory
Route::resource('subcategory', SubcategoryController::class);
//route for subsubcategory
Route::resource('sub-subcategory', SubsubcategoryController::class);

});

// Route for the website
Route::get('website',[FrontendController::class, 'index']);
Route::get('website/shop',[FrontendController::class, 'shop']);
Route::get('website/product/{id}',[FrontendController::class, 'show']);
Route::get('website/checkout',[FrontendController::class, 'checkout']);
Route::get('website/contact',[FrontendController::class, 'contact']);
Route::post('send-message',[FrontendController::class, 'sendMail']);


Route::post('/cart/add/{productId}',[CartController::class, 'add'])->name('cart.add');
Route::get('website/cart', [CartController::class, 'show'])->name('cart.show');

