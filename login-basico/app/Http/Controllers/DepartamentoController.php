<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index() {
        echo "<h1>Lista de Departamento</h1>";
        echo "<ul>";
        echo "<li>Financeiro</li>";
        echo "<li>TI</li>";
        echo "<li>Vendas</li>";
        echo "<li>Compras</li>";
        echo "<li>Jurídico</li>";
        echo "</ul>";        
        echo "<hr />";

        if ( Auth::check() ) {
            $user = Auth::user();
            echo "Usuário Logado: " . $user->name;
        }
        else {
            echo "<h4>Usuário não está autenticado</h4>";
        }
    }
}
