<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
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

// View User

Route::get('/', [MainController::class, 'index']);
Route::get('/home', [MainController::class, 'index']);
Route::get('/shop', [MainController::class, 'shop']);
Route::get('/shop/category={category}', [MainController::class, 'findCategory']);
Route::get('/shop/brand={brand}', [MainController::class, 'findBrand']);
Route::get('/shop/price={p1}-{p2}', [MainController::class, 'findPrice']);
Route::get('/shop/newArrivals', [MainController::class, 'newArrivals']);
Route::get('/shop/bestSellers', [MainController::class, 'bestSellers']);
Route::get('/shop/product={id}', [MainController::class, 'productDetail']);
Route::post('/shop/product={id}/feedback', [MainController::class, 'feedback']);
Route::get('sale', [MainController::class, 'sale']);

//auth
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/home', [AuthController::class, 'checkLogin'])->name('auth.checkLogin');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [AuthController::class, 'saveRegister'])->name('auth.saveRegister');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// cart
Route::get('/shop/product={id}/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::get('/cart/delete/id={id}', [CartController::class, 'destroy']);

//payment
Route::post('/cart/checkout', [OrderController::class, 'checkout']);
Route::get('/checkout', [OrderController::class, 'index']);
Route::post('/checkout/order', [OrderController::class, 'store']);

