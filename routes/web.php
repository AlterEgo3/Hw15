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

//Route::match(['get', 'post'], '/', function () {
//    var_dump(request()->user()->name);
//    echo "<br>";
//
//    echo "<pre>";
//    var_dump(\App\Models\User::where('name', request('name'))->get()->first()->name);
//});
Route::get('/', [\App\Http\Controllers\AdController::class, 'index'])->name('home');
Route::get('/{id}', [\App\Http\Controllers\AdController::class, 'show'])->whereNumber('id')->name('ads.show');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/edit/{?id}', function ($id=null){});
Route::post('/edit/{?id}', function ($id=null){});

Route::get('/delete/{?id}', function ($id=null){});
