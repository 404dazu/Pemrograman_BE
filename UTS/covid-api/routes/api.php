<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
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


Route::get('/patients',[PasienController::class, 'index']);
Route::post('/patients', [PasienController::class, 'store']);
Route::get('/patients',[PasienController::class, 'show']);
Route::put('/patients',[PasienController::class, 'update']);
Route::delete('/patients',[PasienController::class, 'destroy']);
Route::get('/patients/search/{name}',[PasienController::class, 'search']);
Route::get('/patients/search/{address}', [PasienController::class, 'search']);
Route::get('/patients/search/{status}',[PasienController::class,'getStatus']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);