<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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
    return view('index');
});

Route::get('/suporte', function () {
    return view('suporte');
});

 Route::get('/registro', function () {
     return view('auth.register');
 });

Route::post('/find_prod','App\Http\Controllers\HomeController@find_prod');

Route::post('/store','App\Http\Controllers\HomeController@store');

Route::get('/suporte','App\Http\Controllers\HomeController@suporte');

Route::get('/validacao','App\Http\Controllers\HomeController@validacao');

Route::get('/logout','App\Http\Controllers\HomeController@logout');

Route::get('/addProduto/{id}','App\Http\Controllers\HomeController@addProduto');

Route::get('/delProduto/{id}','App\Http\Controllers\HomeController@delProduto');

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
