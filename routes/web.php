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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::resource('/',App\Http\Controllers\NotaController::class);
Route::get('/', [App\Http\Controllers\NotaController::class, 'index']);
Route::get('create', [App\Http\Controllers\NotaController::class, 'create']);
Route::post('nota', [App\Http\Controllers\NotaController::class, 'store']);
Route::delete('nota/{id}', [App\Http\Controllers\NotaController::class, 'destroy']);

Route::get('cliente', [App\Http\Controllers\ClienteController::class, 'index']);
