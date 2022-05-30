<?php

use App\Http\Controllers\ArticleController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
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

Route::controller(ArticleController::class)->group(function(){
    Route::get('/article', 'index');
    Route::get('/article/{id}', 'show');
    Route::post('/article/store', 'store');
    Route::put('/article/{id}/update', 'update');
    Route::delete('/article/{id}/destroy', 'destroy');
});