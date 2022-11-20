<?php

use App\Http\Controllers\User\UserController;
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

Route::controller(UserController::class)->group(function(){

    Route::get('/','login');

    Route::get('/cadastro','cadastrarCredenciais')->name('cadastro');
    Route::post('/cadastro','postCredencial')->name('post.cadastro');

    Route::post('/login','')->name('post.login');
    Route::get('/login','login')->name('get.login');

});
