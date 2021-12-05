@extends('layouts.app',['current_navbar' => 'home'])
@section('content')

    <div class="jumbotron bg-ligth border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            Realize aqui o cadastro de produtos
                        </p>
                        <a href="/produtos" class="btn btn-primary btn-sm">Cadastro de Produtos</a>
                    </div>
                </div>
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            Realize aqui o cadastro de Categorias
                        </p>
                        <a href="/categorias" class="btn btn-primary btn-sm">Cadastro de Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
