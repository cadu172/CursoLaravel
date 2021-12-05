@extends('layouts.app',['current_navbar' => 'produto'])
@section('content')
<div class="card border">
    <div class="card-header">
        <h5 class="card-title">Relação de Produtos Cadastrados</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($produto))
                @foreach($produto as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->nome}}</td>
                        <td>{{$prod->estoque}}</td>
                        <td>{{$prod->preco}}</td>
                        <td>{{$prod->categoria_id}}</td>
                        <td>
                            <a href="{{route('produtos')}}/edit/{{$prod->id}}"
                               class="btn btn-primary btn-sm">Alterar</a>
                            <a href="{{route('produtos')}}/delete/{{$prod->id}}"
                               class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{route('produtos')}}/create/"
                               class="btn btn-primary btn-sm">Incluir Produto</a>
    </div>
</div>
@endsection
