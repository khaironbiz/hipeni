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
Route::get('/mytoken', [\App\Http\Controllers\Api\UserController::class, 'mytoken']);
Route::get('/login', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('api.login');
Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/users', [\App\Http\Controllers\Api\UserController::class, 'store'])->middleware('auth:sanctum');
Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'users'])->middleware('auth:sanctum');
Route::post('/user/{id}/update', [\App\Http\Controllers\Api\UserController::class, 'update'])->middleware('auth:sanctum');
Route::get('/logout', [\App\Http\Controllers\Api\UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show'])->middleware('auth:sanctum');
Route::post('/user/{id}/delete', [\App\Http\Controllers\Api\UserController::class, 'destroy'])->middleware('auth:sanctum');

//
