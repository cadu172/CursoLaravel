<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_View()
    {
        $categorias = $this->getCategoriaALL();
        
        //
        return view('index_categoria',
            compact('categorias'));
    }

    /**
     * Retorna os dados do index em formato json
     * incluido por carlos em 21/04/2021
     */
    public function index_JSON() {
        $categorias = $this->getCategoriaALL();
        return json_encode($categorias);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("create_categoria");        
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
        $categ = new Categoria();
        $categ->nome = $request->input('nome');
        $categ->save();

        // voltar ao index para listar os dados cadastrados
        //return $this->index();
        return redirect(route('categorias'));
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
        //
        $categ = Categoria::find($id);

        if ( isset($categ) )
        {
            return view('edit_categoria',compact('categ'));
        }
        
        // voltar para a página inicial
        return redirect(route('categorias'));        
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
        $categ = Categoria::find($id);

        if ( isset($categ) )
        {            
            $categ->nome = $request->input('nome');
            $categ->save();
        }
        
        // voltar para a página inicial
        return redirect(route('categorias'));        
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
        $categ = Categoria::find($id);

        if ( isset($categ) )
        {
            $categ->delete();
        }
        
        // voltar para a página inicial
        return redirect(route('categorias'));
    }

    /**
     * obtem a relação de categorias
     */
    private function getCategoriaALL() {
        return Categoria::all();
    }

}
