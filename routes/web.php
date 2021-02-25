<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ButtonController;
use App\Event\TaskEvent;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayController;
use App\helper\email;
use Illuminate\http\Request;
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
Route::get('event',function (){
        event(new TaskEvent('hello world'));
});
Route::get('mail',function (){
    $x=new email();
    $x->eemail('vijaysangoi29@gmail.com','insert','get a golden tooth');
});


Route::post ( '/',[\App\Http\Controllers\PayController::class,'index']  )->name('verify');

Route::get('to_pay',function (){
    return view('pay') ;
})->name('to_pay');

Route::post('test',[PayController::class,'verify'])->name('test');

Route::post('testing',[TestController::class, 'index'])->name('testing');
Route::get('incomplete',[ButtonController::class, 'incomplete'])->name('incomplete');
Route::get('complete',[ButtonController::class, 'complete'])->name('complete');
Route::post('new_task',[ButtonController::class, 'insert'])->name('new_task');
Route::get('/home', [HomeController::class, 'index'])->name('home');
