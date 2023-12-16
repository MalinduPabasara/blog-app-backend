<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//public routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    //protected
    Route::get('/blog', [BlogController::class, 'index']);
    Route::post('/blog', [BlogController::class, 'store']);
    Route::post('/blog/{id}', [BlogController::class, 'update']);
    Route::post('/blog/show/{id}', [BlogController::class, 'show']);
    Route::post('/blog/delete/{id}', [BlogController::class, 'destroy']);
    Route::post('/blog/disable/{id}', [BlogController::class, 'disable']);

    Route::post('logout', [AuthController::class, 'logout']);
});
