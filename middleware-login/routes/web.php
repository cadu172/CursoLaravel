<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/produtos',[App\Http\Controllers\ProdutoControlador::class,'index']);

Route::get("/negado", function() {
    return("Acesso negado, usuário não autenticado no sistema");
})->name("acesso_negado");

Route::get("/perfil_negado", function() {
    return("Você não possui permissão de acesso nesta área, somente admin possui acesso");
})->name("perfil_negado");

Route::get('/logout', function(Request $request) {
    $request->session()->flush();
    return response("Deslogado com sucesso",200);
});

/*
validação de login
*/
Route::post('/login', function(Request $request) {

    $login_ok = false;
    $user_name = $request->input("user");
    $password = $request->input("passwd");
    $isAdmin = false;

    switch ( $user_name )
    {
        case "carlos":
           $login_ok = $password==="123mudar";
           $isAdmin = true;
           break;
        case "eduardo":
           $login_ok = $password==="123mudar";
           break;
        default:
           $login_ok = false;
    }

    if ( $login_ok  )
    {
        // armazenar na sessão o login atual
        $request->session()->put('login',[
            "user" => $user_name,
            "admin" => $isAdmin
        ]);

        //session(['login'=>$user_name]);
        return response("Login OK", 200);
    }
    else
    {
        // apagar sessão atual
        $request->session()->flush();
        return response("Erro de Login", 401);
    }

});
