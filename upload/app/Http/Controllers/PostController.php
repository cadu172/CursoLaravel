<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Post::all();
        return view('index',['album'=>$album]);
    }


    /**
     * Obtem a imagem do servidor
     *     
     */
    public function getImage($id)
    {
        $post = Post::find($id);

        if (isset($post)) {
            
            // excluir arquivo                       
            //$arquivo = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($post->arquivo);
            // coloquei o "Public" porque a função getAdapter não está funcionando
            // indica que houve sucesso na exclusao
            return Storage::download("public/" . $post->arquivo);
        }

        // indica que NAO houve sucesso na exclusao
        return redirect('/download=false');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // salvar imagem no disco
        $pathArquivo = $request->file('arquivo')->store('imagens','public');
        
        //
        $post = new Post();
        $post->email = $request->input('email');
        $post->mensagem = $request->input('mensagem');
        $post->arquivo = $pathArquivo;
        $post->save();

        // voltar a página inicial
        return redirect('/?confirmPost=true&source=');

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
        $post = Post::find($id);

        if (isset($post)) {
            
            // obtem o nome do arquivo que será apagado
            $arquivo = $post->arquivo;            

            // excluir arquivo
            Storage::disk('public')->delete($arquivo);

            // excluir registro do BD
            $post->delete();

            // indica que houve sucesso na exclusao
            return redirect('/?delete=true');
        }

        // indica que NAO houve sucesso na exclusao
        return redirect('/?delete=false');
    }
}
