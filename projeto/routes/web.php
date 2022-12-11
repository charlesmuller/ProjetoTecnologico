<?php

use App\Http\Controllers\apiController;
use App\Http\Controllers\collectionController;
use App\Http\Controllers\comicsController;
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

Route::resource('colecao', collectionController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::controller(apiController::class)->group(function () {
    Route::get('/api/adicionarhq','add')->name('api.add');
    Route::post('/api/salvar','store')->name('api.store');
    Route::post('/api/busca','chamada')->name('api.chamada');
    Route::post('/api/retorno','retorno')->name('api.retorno');
});

Route::get('/colecao/{colecao}/comics', [comicsController::class, 'index'])->name('comics.index');
Route::post('/colecao/{colecao}/comics', [comicsController::class, 'readed'])->name('comics.readed');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/colecao/colecao', function () {
        return view('colecao');
    })->name('colecao');
});

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';
