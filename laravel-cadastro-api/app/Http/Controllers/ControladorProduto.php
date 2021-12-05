<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_View()
    {
        
        $produto = Produto::all();
        
        //
        return view('index_produto',compact('produto'));
    }

    public function index_JSON()
    {
        
        $produto = Produto::all();
        
        //
        return $produto->toJson();
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categ = Categoria::all();
        //
        return view('create_produto')
            ->with('categ',$categ);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $prod = new Produto();
        $prod->nome = $request->input('nome');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();

        return $prod->toJson();
        //return redirect(route('produtos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_JSON($id)
    {
        //
        $produto = Produto::find($id);
        
        if(isset($produto)) {
            return json_encode($produto);
        }
    }

    public function show($id)
    {
        //
        $produto = Produto::find($id);       
    
        if(isset($produto))
        {
            return $produto->toJson();
        }
        
        // caso nao exista, retorna ao index
        return response("Produto não localizado", 404);
    }    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $produto = Produto::find($id);        
        
        if(isset($produto))
        {
            $produto->nome = $request->input('nome');
            $produto->estoque = $request->input('estoque');
            $produto->preco = $request->input('preco');
            $produto->categoria_id = $request->input('categoria_id');
            $produto->save();    
            
            // direcionar para a página de produtos
            return $produto->toJson();            
        }
        
        // caso nao exista, retorna ao index
        return response("Product Not Found", 404);
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
        //
        $produto = Produto::find($id);        
                
        if(isset($produto))
        {
            $produto->delete();    

            return response("OK", 200);
        }
        return response("Product Not Found", 404);
    }
}
