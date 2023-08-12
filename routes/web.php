<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('form','test2');
Auth::routes();
Route::get('event',[\App\Http\Controllers\MiscController::class,'event']);
Route::get('mail',[\App\helper\email::class,'dispatch']);
Route::post ( '/',[\App\Http\Controllers\PayController::class,'index']  )->name('verify');
Route::get('to_pay',[\App\Http\Controllers\PayController::class,'index'])->name('to_pay');
Route::post('test',[\App\Http\Controllers\PayController::class,'verify'])->name('test');
Route::post('testing',[App\Http\Controllers\TestController::class, 'index'])->name('testing');
Route::get('incomplete',[App\Http\Controllers\ButtonController::class, 'incomplete'])->name('incomplete');
Route::get('complete',[App\Http\Controllers\ButtonController::class, 'complete'])->name('complete');
Route::post('new_task',[App\Http\Controllers\ButtonController::class, 'insert'])->name('new_task');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/doc', [App\Http\Controllers\HomeController::class, 'index'])->name('documentation');
