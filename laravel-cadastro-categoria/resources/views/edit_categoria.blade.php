@extends('layouts.app',['current_navbar'=>'categoria'])
@section('content')
<div class="card border">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Categoria</h5>
    </div>
    <div class="card-body">        
        <form action="/categorias/update/{{$categ->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    value="{{$categ->nome}}"
                    aria-describedby="nomeHelp"
                    placeholder="Informe o nome da categoria">
                <small id="nomeHelp" class="form-text text-muted">Esta descrição será gravada no Banco de Dados</small>
            </div>
            <button
                type="submit"
                class="btn btn-primary btn-sm">Atualizar</button>        

            <a href="{{route('categorias')}}" class="btn btn-danger btn-sm">Cancelar</a>                
        </form>
    </div>
</div>
@endsection
