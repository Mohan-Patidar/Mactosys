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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth', 'disablepreventback']], function () {
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::resource('products','App\Http\Controllers\ProductController');
    Route::get('/connected', '\App\Http\Controllers\ProductController@UserConnection');
    Route::post('/useradd', '\App\Http\Controllers\ProductController@UserAdd');
   
    });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
