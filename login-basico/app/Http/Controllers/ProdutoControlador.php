<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{

    public function __construct() {
        /*
        a middleware de autenticação pode ser chamada no construtor ou mesmo na criação da rota
        */
        //$this->middleware("auth");
    }

    //
    public function index() {

        return (
            "<h4>" .
                "<li>Peixe</li>" .
                "<li>Pão</li>" .
                "<li>Macarrão</li>" .
                "<li>Miojo</li>" .
                "<li>Frango</li>" .
            "</h4>"
        );

    }
}
