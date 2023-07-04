<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Models\Shoe;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::get('api-product', [ApiController::class, 'index']);
Route::get('/api-shop/category={category}', [ApiController::class, 'findCategory']);
Route::get('/api-shop/brand={brand}', [ApiController:: class, 'findBrand']);
Route::get('/api-shop/product={id}', function($id) {
    return Shoe::findOrFail($id);
});

Route::get('/api-shop/categories={category}', function($category) {
    return  DB::table('shoes')->join('categories', 'shoes.id_category','=','categories.id_category')
    ->where('categories.name_category','=',$category)->get();
});

Route::get('/api-shop/brand={brand}', function($brand) {
    return  DB::table('shoes')->join('brands', 'shoes.id_brand','=','brands.id_brand')
    ->where('brands.name_brand','=',$brand)->get();
});

Route::post('/api-user/create', [ApiController:: class, 'store']);

Route::post('/api-order/create', [ApiOrderController:: class, 'store']);

//all products purchased from 1 user
Route::get('/api-allProducts/user={id}', [ApiController:: class, 'allProducts_user']);