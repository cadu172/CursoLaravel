<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias',[App\Http\Controllers\ControladorCategoria::class,'index_JSON'])->name('api_categorias');
Route::get('/produtos',[App\Http\Controllers\ControladorProduto::class,'index_JSON'])->name('api_produtos');
Route::post('/produtos',[App\Http\Controllers\ControladorProduto::class,'store']);
Route::delete('/produtos/{id}',[App\Http\Controllers\ControladorProduto::class,'destroy']);
Route::get('/produtos/{id}',[App\Http\Controllers\ControladorProduto::class,'show']);
Route::put('/produtos/{id}',[App\Http\Controllers\ControladorProduto::class,'update']);