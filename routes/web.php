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

Route::get('/area-de-suporte', function () {
    return view('support_area');
});

// Para criar um novo usuário apenas descomentar essa rota e preencher o formulário
// Route::get('/registro', function () {
//     return view('auth.register');
// });

/*
Route::get('/pesquisa', 'App\Http\Controllers\PesquisaController@index')->name('pesquisa');

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/login', function () {
    return view('\auth\login');
});

Route::get('/ong_login', function () {
    return view('ong_login');
});

Route::get('/ong_register', function () {
    return view('ong_register');
});

Route::post('/ongs_mng', 'App\Http\Controllers\ONGController@store');

Route::get('/ongs_mng', function () {
    return view('ongs_mng');
});

Route::post('/registra_adocao','App\Http\Controllers\PetsDetail@registra_adocao');

Route::get('/ong_logout', 'App\Http\Controllers\ONGController@logout');

Route::post('/logar_ong', 'App\Http\Controllers\ONGController@login');

Route::get('/pets/{id}', 'App\Http\Controllers\PetsDetail@index');*/

Route::post('/find_prod','App\Http\Controllers\HomeController@find_prod');

Route::post('/store','App\Http\Controllers\HomeController@store');

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
