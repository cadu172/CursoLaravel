<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //
    public function __construct() {
        //$this->middleware("auth");   
    }

    public function index() {
        echo "<h1>Lista de Produtos</h1>";
        echo "<ul>";
        echo "<li>Caneta</li>";
        echo "<li>Sulfite</li>";
        echo "<li>Borracha</li>";
        echo "<li>Caderno</li>";
        echo "<li>Mochila</li>";
        echo "</ul>";
    }
}
