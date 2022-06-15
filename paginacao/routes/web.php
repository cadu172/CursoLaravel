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
//Auth::routes();
Route::get('/',[App\Http\Controllers\ClienteControlador::class, 'index'])->name('index');
Route::get('/indexJS',[App\Http\Controllers\ClienteControlador::class, 'indexJS'])->name('indexJS');
Route::get('/indexJSON',[App\Http\Controllers\ClienteControlador::class, 'indexJSON'])->name('indexJSON');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*

Observações:

1) Criado migration para tabela de clientes e um model para acessar estes dados
2) Importamos uma base de 1000 clientes para realizar os teste de leitura dos dados em um banco de dados novo chamado "paginacao"
3) Geramos uma tabela na view index.php
4) --- agora temos que continuar na aula 178 - Paginando Tablea

*/
