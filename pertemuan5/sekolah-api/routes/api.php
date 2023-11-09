<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Controllers\StudentController;
use App\Student;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    #index student
    Route::get('/students', [StudentController::class, 'index']);

    #nambah data
    Route::post('/students', [StudentController::class, 'store']);

    #menampilkan detail data
    Route::get('/students/{id}', [StudentController::class, 'show']);

    #update data
    Route::put('/students/{id}', [StudentController::class, 'update']);

    #hapus data
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});