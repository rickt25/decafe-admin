<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CategoryController;

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

Route::get('category', [CategoryController::class, 'getCategories']);
Route::get('categorylist', [CategoryController::class, 'getCategoryList']);
Route::get('menu', [MenuController::class, 'getMenus']);
Route::get('menu/{category_id}', [MenuController::class, 'getMenuByCategory']);
Route::get('promoMenu', [MenuController::class, 'getPromoMenus']);

Route::get('order', [OrderController::class, 'viewTransaction']);
Route::post('order', [OrderController::class, 'addTransaction']);
