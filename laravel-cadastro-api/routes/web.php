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
    return view('index');
})->name('home');

// rotas de produtos
Route::get ('/produtos',[App\Http\Controllers\ControladorProduto::class  ,'index_View'])->name('produtos');
Route::post('/produtos',[App\Http\Controllers\ControladorProduto::class  ,'store']);
Route::get ('/produtos/create',[App\Http\Controllers\ControladorProduto::class ,'create']);
Route::get ('/produtos/edit/{id}',[App\Http\Controllers\ControladorProduto::class ,'edit']);
Route::get ('/produtos/delete/{id}',[App\Http\Controllers\ControladorProduto::class ,'destroy']);
Route::post('/produtos/update/{id}',[App\Http\Controllers\ControladorProduto::class ,'update']);


// rotas de categoria
Route::get ('/categorias',[App\Http\Controllers\ControladorCategoria::class,'indexView'])->name('categorias');
Route::post('/categorias',[App\Http\Controllers\ControladorCategoria::class,'store']);
Route::get ('/categorias/create',[App\Http\Controllers\ControladorCategoria::class,'create']);
Route::get ('/categorias/edit/{id}',[App\Http\Controllers\ControladorCategoria::class,'edit']);
Route::get ('/categorias/delete/{id}',[App\Http\Controllers\ControladorCategoria::class,'destroy']);
Route::post('/categorias/update/{id}',[App\Http\Controllers\ControladorCategoria::class,'update']);


//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
