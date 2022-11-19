<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConsultantController;

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

//konsultan
Route::get('consultants',[\App\Http\Controllers\Api\ConsultantController::class,'index'])->name('consultants')->middleware('auth:sanctum');
Route::post('consultants',[\App\Http\Controllers\Api\ConsultantController::class,'store'])->name('consultants.store');
Route::get('consultants/{id}',[\App\Http\Controllers\Api\ConsultantController::class,'show'])->name('consultants.show');
Route::post('consultants/{id}/update',[ConsultantController::class,'update'])->name('consultants.update')->middleware('auth:sanctum');


//konsultasi
Route::get('consultations',[\App\Http\Controllers\Api\ConsultationController::class,'index'])->name('consultation')->middleware('auth:sanctum');
Route::get('consultation/{id}',[\App\Http\Controllers\Api\ConsultationController::class,'show'])->name('consultation.show')->middleware('auth:sanctum');
Route::post('consultation/{id_konsultan}',[\App\Http\Controllers\Api\ConsultationController::class,'store'])->name('consultation.store')->middleware('auth:sanctum');
//Route::get('myconsultation',[\App\Http\Controllers\Api\ConsultationController::class,'myconsultation'])->name('consultation.mine')->middleware('auth:sanctum');
