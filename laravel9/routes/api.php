<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Models\Store;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(ArticleController::class)->group(function(){
    Route::get('article', 'index');
    Route::get('article/{id}', 'show');
    Route::post('article/store', 'store');
    Route::put('article/{id}/update', 'update');
    Route::delete('article/{id}/destroy', 'destroy');
});

Route::controller(StoreController::class)->group(function(){
    Route::get('store', 'index');
    Route::get('store/{id}', 'show');
    Route::post('store/create', 'store');
    Route::put('store/{id}/update', 'update');
    Route::delete('store/{id}/destroy', 'destroy');
});

