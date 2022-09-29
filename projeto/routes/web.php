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

Route::get('/login', [\App\Http\Controllers\loginController::class, 'index']);
Route::get('/cadastro', [\App\Http\Controllers\cadastroController::class, 'index']);
Route::post('/cadastro/salvar', [\App\Http\Controllers\cadastroController::class, 'store']);
Route::get('/colecao', [\App\Http\Controllers\colecaoController::class, 'index']);
Route::get('/colecao/criar', [\App\Http\Controllers\colecaoController::class, 'create']);
Route::post('/colecao/salvar', [\App\Http\Controllers\colecaoController::class, 'store']);

