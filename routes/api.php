<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'sign_up']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::get('address',[\App\Http\Controllers\AddressBookController::class,'index'])->middleware('auth:sanctum');
Route::get('address/{address}',[\App\Http\Controllers\AddressBookController::class,'show'])->middleware('auth:sanctum');
Route::put('update/{address}',[\App\Http\Controllers\AddressBookController::class,'update'])->middleware('auth:sanctum');
Route::post('search',[\App\Http\Controllers\AddressBookController::class,'search'])->middleware('auth:sanctum');
Route::post('create',[\App\Http\Controllers\AddressBookController::class,'create'])->middleware('auth:sanctum');
Route::delete('delete/{address}',[\App\Http\Controllers\AddressBookController::class,'delete'])->middleware('auth:sanctum');