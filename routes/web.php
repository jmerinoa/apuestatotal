<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\playerController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\registroController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layouts/admin');
});
Route::resource('mantenimiento/player',playerController::class);
Route::resource('mantenimiento/administrador',administradorController::class);
Route::resource('mantenimiento/registro',registroController::class);
