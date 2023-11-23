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

// Mengambil semua data index
Route::get('/patients',[PasienController::class, 'index']);
// Membuat data baru dan dikirim kedalam DB
Route::post('/patients', [PasienController::class, 'store']);
// Mengambil data menggunakan ID
Route::get('/patients/{id}',[PasienController::class, 'show']);
// Update data Pasien lewat ID
Route::put('/patients/{id}',[PasienController::class, 'update']);
// Menghapus data pasien lewat ID
Route::delete('/patients/{id}',[PasienController::class, 'destroy']);

// Mencari data pasien lewat nama
Route::get('/patients/search/{name}',[PasienController::class, 'search']);
// Mencari data pasien lewat alamat
Route::get('/patients/search/{address}', [PasienController::class, 'search']);
// Mencari data pasien lewat status
Route::get('/patients/search/{status}',[PasienController::class,'getStatus']);

// Membuat akun untuk mendapatkan API
Route::post('/register', [AuthController::class, 'register']);
// Login untuk mendapatkan API
Route::post('/login', [AuthController::class, 'login']);