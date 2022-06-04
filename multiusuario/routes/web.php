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

Auth::routes();

// ROTAS PARA HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

// ROTAS DE LOGIN/LOGOUT PARA O GUARD WEB
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
//Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ROTAS DE LOGIN PARA O GUARD ADMIN
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.post');