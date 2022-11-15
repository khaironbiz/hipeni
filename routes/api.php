<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'users'])->middleware('auth:sanctum');
Route::get('/logout', [\App\Http\Controllers\Api\UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
