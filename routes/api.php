<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your applicatasktion. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/login", [\App\Http\Controllers\AuthController::class, 'login']);
Route::post("/register", [\App\Http\Controllers\AuthController::class, 'register']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("/task/{state}", [\App\Http\Controllers\TaskController::class, 'get']);
    Route::post("/task", [\App\Http\Controllers\TaskController::class, 'post']);
    Route::put("/task/{id}", [\App\Http\Controllers\TaskController::class, 'put']);
    Route::delete("/task/{id}", [\App\Http\Controllers\TaskController::class, 'delete']);
});
