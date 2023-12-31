<?php

use App\Http\Controllers\AnimalController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/animals", [AnimalController::class,"index"]);

#method nambah
Route::post("/animals", [AnimalController::class,"store"]);

#method edit
Route::put("/animals/{id}", [AnimalController::class,"update"]);

#method delete
Route::delete("/animals/{id}", [AnimalController::class,"destroy"]);
