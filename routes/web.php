<?php

use App\Http\Controllers\MainController;
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
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'saveRegister'])->name('auth.saveRegister');
Route::get('/', [MainController::class, 'logout'])->name('auth.logout');
Route::post('/', [MainController::class, 'checkLogin'])->name('auth.checkLogin');