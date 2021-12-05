<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Http\Controllers\MeuControlador;
use App\Http\Controllers\ClienteControlador;

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

Route::prefix('07_view')->group(function(){

    Route::get("departamentos",function(){
        return view(
            "outras.departamentos"
        );
    })->name("departamentos");

    Route::get("produtos",function(){
        return view(
            "outras.produtos"
        );
    })->name("produtos");

    Route::get("opcoes/{opcao?}",function($opcao=null){
        return view(
            "outras.opcoes",
            compact(['opcao'])
        );
    })->name("opcoes");

    Route::get('bootstrap', function() {
        return view("outras.usando_bootstrap");
    });
    

});

Route::prefix('06_controladores')->group(function(){

    Route::get('/', function() {
        return("Criando controladores");
    });

    Route::get('produtos',[MeuControlador::class, 'produtos']);
    Route::get('idade',[MeuControlador::class, 'getIdade']);
    Route::get('nome',[MeuControlador::class, 'getNome']);
    Route::get('multiplicar/{p1}/{p2}',[MeuControlador::class, 'multiplicar']);

    //rota para o controlador ClienteControlador
    route::resource('clientes',ClienteControlador::class);


});

Route::prefix('05_rotas')->group(function() {

    //rota fixa
    Route::get('/aula12/rota_fixa/sejabemvindo', function() {
        return("Rota seja bem vindo");
    });

    //rota com parametro
    Route::get('/aula12/ola/{nome}/{sobrenome}', function($nome,$sobrenome) {
        return("Olá $nome $sobrenome, seja Bem Vindo!");
    });

    // rota opcional
    /** utilizamos rota opcional quando o usuario não é obrigado informar o parametro
     * na rota, assim podemos definir um valor padrão para o parametro em caso o usuário não informar
     * Caso nenhum valor informado, retornará "Carlos Eduardo dos Santos Roberto" */
    Route::get('/aula13/{nome?}',function($nome="Carlos Eduardo dos Santos Roberto"){
        return $nome;
    });

    // rota com regra
    Route::get('/aula14/rotacomregra/{qtd}/{nome}', function ($qtd,$nome) {
        for($i=1;$i<=$qtd;$i++) {
            echo "<p>$i - $nome</p>";
        };
    })
    ->where('nome','[A-Za-z]+')
    ->where('qtd','[0-9]+');

    // aula 15, agrupamento de rotas
    /**
     * cria um prefixo que agrupa outras rotas, ideal para nomear um grupo de serviços, por exemplo: boleto
     * neste grupo boleto pode ter as rotas para boleto santander, boleto bradesco etc.
     */
    Route::prefix('/aula15')->group(function() {

        // rota raíz do prefixo
        Route::get('/', function() {
            //return('Rota Raíz da aula 15');
            return view('aula15_app');
        });

        Route::get('/profile',function(){
            return view('aula15_profile');
        });

        Route::get('/user',function(){
            return view('aula15_user');
        });

    });

    // aula 16 - utilizando rotas nomeadas
    /**
     * cria uma alias para uma rota no arquivo web.php
     */
    Route::prefix('/aula16')->group(function() {

        Route::get('/', function() {
            return view('aula15_app');
        })->name('aula16|app');

        Route::get('/profile', function() {
            return view('aula15_profile');
        })->name('aula16|profile');

        Route::get('/user', function() {
            return view('aula15_user');
        })->name('aula16|user');

        Route::get('/meusprodutos', function() {
            return view('aula15_meusprodutos');
        })->name('aula16|meusprodutos');

    });

    Route::prefix('aula17')->group( function() {

        // redirecionamento usando a URI fixa
        Route::redirect('listaprodutos1', '/aula16/meusprodutos', 301);

        route::get('listaprodutos2',function(){
            return redirect()->route('aula16|meusprodutos');
        });

    } );


    Route::prefix('aula18')->group(function(){

        Route::post('requisicoes', function(Request $req) {
            return "Método POST executado";
        });

        Route::get('requisicoes', function(Request $req) {
            return "Método GET executado";
        });

        Route::delete('requisicoes', function(Request $req) {
            return "Método DELETE executado";
        });

        Route::options('requisicoes', function(Request $req) {
            return "Método OPTIONS executado";
        });

        Route::patch('requisicoes', function(Request $req) {
            return "Método PATCH executado";
        });

        Route::put('requisicoes', function(Request $req) {
            return "Método PUT executado";
        });

    });

});
