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

Route::resource('/colecao', \App\Http\Controllers\colecaoController::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

//Route::resource('/api', \App\Http\Controllers\apiController::class)
//    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

Route::controller(\App\Http\Controllers\apiController::class)->group(function () {
    Route::get('/api/adicionarhq','add')->name('api.add');
    Route::post('/api/salvar','store')->name('api.store');
    Route::post('/api/busca','chamada')->name('api.chamada');
});

Route::controller(\App\Http\Controllers\loginController::class)->group(function () {
    Route::get('/login','index') ->name('login.index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
