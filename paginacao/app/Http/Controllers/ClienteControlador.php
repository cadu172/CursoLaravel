<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClienteControlador extends Controller
{
    public function index()
    {

        // obtem um array com os dados dos clientes
        $clientes = Clientes::paginate(10);

        // retorna a view com os dados
        return view('index',
            ['clientes'=>$clientes]);
    }

    public function indexJS()
    {

        // retorna a view com os dados
        return view('indexjs');
    }

    public function indexJSON()
    {
        // obtem um JSON com os dados dos clientes
        return Clientes::paginate(10);
    }


}
