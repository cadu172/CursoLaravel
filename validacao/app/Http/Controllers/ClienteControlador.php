<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::all();
        
        //
        return view('clientes',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // aula 85 - indica que os campos devem ser obrigatórios
        $request->validate(
            // no primeiro array, incluímos os tratamentos dos campos
            [
                //'nome'=>'required|min:5|max:10',
                'nome'=>'required|min:5|max:255|unique:clientes',
                'idade'=>'required|integer',
                'endereco'=>'required|min:10',
                'email'=>'required|email'
            ],
            // no segundo array incluimos as customizações das mensagens de erro
            [
                // regra genérica
                'required'=>'O campo :attribute não pode estar em branco',                
                
                //validações do campo nome
                //'nome.required'=>'O campo nome é obrigatório',
                'nome.min'=>'Informe um nome válido, tamanho mínino de 5 caracteres',
                'nome.unique'=>'O Nome informado já está cadastrado',

                // validações da idade
                //'idade.required'=>'O Campo idade é obrigatório',
                'idade.integer'=>'Verifique se o campo idade está em um formato numérico válido',

                // validação do endereco
                //'endereco.required'=>'O campo endereço é obrigatório, com tamanho mínimo de 10 caracteres',

                //campo email
                'email.email'=>'Informe um endereço de e-mail válido',
                //'email.required'=>'Informe um endereço de e-mail válido'
            ]
        );
        
        //
        $cli = new Cliente();
        $cli->nome = $request->input("nome");
        $cli->idade = $request->input("idade");
        $cli->endereco = $request->input("endereco");
        $cli->email = $request->input("email");
        $cli->save();

        // retorna a view com a listagem de clientes
        return($this->index());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
