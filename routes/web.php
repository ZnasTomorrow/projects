<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogControlador;
use App\Http\Controllers\categoriaControl;

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
Route::get('/RideCapital', [blogControlador::class, 'mostrar'])->name('RideCapital');

Route::post('/RideCapital', [blogControlador::class, 'saving'])->name('RideCapital'); 

Route::get('/RideCapital/{id}', [blogControlador::class, 'show'])->name('RideCapital-edit'); 

Route::patch('/RideCapital/{id}', [blogControlador::class, 'update'])->name('RideCapital-update'); 

Route::delete('/RideCapital/{id}', [blogControlador::class, 'destroy'])->name('RideCapital-destroy'); 

Route::resource('categories', categoriaControl::class);

