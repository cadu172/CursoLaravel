<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\ProdutoAdmin;

class ProdutoControlador extends Controller
{
    //
    private $produto = ["Televisao 40", "Notebook Apple", "Teclado HP", "Impressora Epson"];

    public function __construct() {
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }

    public function index() {


        echo "<ul>";

        foreach($this->produto as $p ) {

            echo "<li>" . $p . "</li>";
        }

        echo "</ul>";

    }

}
