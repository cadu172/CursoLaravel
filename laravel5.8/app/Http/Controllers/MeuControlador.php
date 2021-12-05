<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    //
    public function produtos() {
        return view("aula15_meusprodutos");
    }

    public function getIdade() {
        return "39 Anos de idade";
    }

    public function getNome() {
        return "Carlos Eduardo dos Santos Roberto";
    }

    public function multiplicar($p1, $p2) {
        return "Resultado => " . ($p1 * $p2);
    }
}
