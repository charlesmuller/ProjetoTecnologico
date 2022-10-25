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
    return redirect('/login');
});

Route::controller(\App\Http\Controllers\userController::class)->group(function () {
    Route::get('/cadastro','index')->name('cadastro.index');
    Route::post('/cadastro/salvar','store')->name('cadastro.store');
});

Route::controller(\App\Http\Controllers\colecaoController::class)->group(function () {
    Route::get('/colecao', 'index')->name('colecao.index');
    Route::get('/colecao/criar','create')->name('colecao.create');
    Route::get('/colecao/adicionarhq','add')->name('colecao.add');
    Route::post('/colecao/salvar','store')->name('colecao.store');
    Route::delete('/colecao/destroy/{colecao}', 'destroy')->name('colecao.destroy');
});

Route::controller(\App\Http\Controllers\loginController::class)->group(function () {
    Route::get('/login','index') ->name('login.index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});