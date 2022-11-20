<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ConsultantController;
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
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
Route::get('/mytoken', [\App\Http\Controllers\Api\UserController::class, 'mytoken']);
Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/users', [\App\Http\Controllers\Api\UserController::class, 'store'])->middleware('auth:sanctum');
Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index'])->middleware('auth:sanctum');
Route::put('/user/{id}/update', [\App\Http\Controllers\Api\UserController::class, 'update'])->middleware('auth:sanctum');
Route::get('/logout', [\App\Http\Controllers\Api\UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user/{id}', [\App\Http\Controllers\Api\UserController::class, 'show'])->middleware('auth:sanctum');
Route::delete('/user/{id}/delete', [\App\Http\Controllers\Api\UserController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/user/{id}/foto', [\App\Http\Controllers\Api\UserController::class, 'upload_foto'])->middleware('auth:sanctum');

//konsultan
//Route::get('consultants',[\App\Http\Controllers\Api\ConsultantController::class,'index'])->name('consultants')->middleware('auth:sanctum');
//Route::post('consultants',[\App\Http\Controllers\Api\ConsultantController::class,'store'])->name('consultants.store');
//Route::get('consultants/{id}',[\App\Http\Controllers\Api\ConsultantController::class,'show'])->name('consultants.show');
//Route::post('consultants/{id}/update',[ConsultantController::class,'update'])->name('consultants.update')->middleware('auth:sanctum');


//konsultasi
Route::get('consultations',[\App\Http\Controllers\Api\ConsultationController::class,'index'])->name('consultation')->middleware('auth:sanctum');
Route::get('consultation/{id}',[\App\Http\Controllers\Api\ConsultationController::class,'show'])->name('consultation.show')->middleware('auth:sanctum');
Route::post('consultation/{id_konsultan}',[\App\Http\Controllers\Api\ConsultationController::class,'store'])->name('consultation.store')->middleware('auth:sanctum');
//Route::get('myconsultation',[\App\Http\Controllers\Api\ConsultationController::class,'myconsultation'])->name('consultation.mine')->middleware('auth:sanctum');

//konsultan
Route::resource('consultants', ConsultantController::class);

//chats
Route::resource('/chats', ChatController::class)->middleware('auth:sanctum'); // tambahkan ini
