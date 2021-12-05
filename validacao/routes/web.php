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

Route::get ('/create_cliente',[App\Http\Controllers\ClienteControlador::class,'create'])->name('cliente.create');
Route::get ('/cliente',[App\Http\Controllers\ClienteControlador::class,'index'])->name('cliente.show');
Route::post('/cliente',[App\Http\Controllers\ClienteControlador::class,'store'])->name('cliente.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * 
 * teste de edição CARLOS
*/