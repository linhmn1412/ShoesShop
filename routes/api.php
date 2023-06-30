<?php

use App\Http\Controllers\Api\ApiController;
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

// Route::get('api-product', [ApiController::class, 'index']);
// Route::get('/shop/category={category}', [ApiController::class, 'findCategory']);
// Route::get('/shop/brand={brand}', [ApiController:: class, 'findBrand']);
// Route::get('/shop/product={id}', function($id) {
//     return Shoe::findOrFail($id);
// });

// Route::get('/shop/categories={category}', function($category) {
//     return  DB::table('shoes')->join('categories', 'shoes.id_category','=','categories.id_category')
//     ->where('categories.name_category','=',$category)->get();
// });

// Route::get('/shop/brand={brand}', function($brand) {
//     return  DB::table('shoes')->join('brands', 'shoes.id_brand','=','brands.id_brand')
//     ->where('brands.name_brand','=',$brand)->get();
// });
