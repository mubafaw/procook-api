<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/product/all', [ApiController::class, 'showAll']);
Route::get('/product/{category}', [ApiController::class, 'showAllProductsInCategory']);
Route::get('/product/{category}/{id}', [ApiController::class, 'showProduct']);
Route::post('/product/{id}', [ApiController::class, 'createProduct']);
Route::put('/product/{id}', [ApiController::class, 'updateProduct']);
Route::delete('/product/{id}', [ApiController::class, 'deleteProduct']);
