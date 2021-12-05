@extends('layouts.app',['current_navbar'=>'produto'])
@section('content')
<div class="card border">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Produto</h5>
    </div>
    <div class="card-body">        
        <form action="{{route('produtos')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome do Produto</label>
                    <input type="text"
                        class="form-control"
                        id="nome"
                        name="nome"
                        aria-describedby="nomeHelp"
                        placeholder="Descrição do Produto">
                    <small id="nomeHelp" class="form-text text-muted">Esta descrição será gravada no Banco de Dados</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" id="estoque" name="estoque" placeholder="0">                
                </div>
                
                <div class="form-group col-md-3">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="0,00">                                
                </div>

                <div class="form-group col-md-7">
                    <label for="categoria">Categoria</label>
                    <!--input type="text" class="form-control" id="categoria" name="categoria" placeholder="1"-->                                
                    @component('components.cmbcategorias',
                        [
                            'id' => "categoria",
                            'name' => "categoria",
                            'valorPadrao' => 0,
                            'dadosMenu' => $categ
                        ])
                    @endcomponent
                </div>

            </div>
            
            <button
                type="submit"
                class="btn btn-primary btn-sm">Gravar</button>        

            <a href="{{route('produtos')}}" class="btn btn-danger btn-sm">Cancelar</a>                
        </form>
    </div>
</div>
@endsection
