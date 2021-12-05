@extends('layouts.app',['current_navbar' => 'categoria'])
@section('content')
<div class="card border">
    <div class="card-header">
        <h5 class="card-title">Relação de Categorias Cadastradas</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th>-</th>
                </tr>                
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->nome}}</td>
                        <td>
                            <a href="{{route('categorias')}}/edit/{{$cat->id}}"
                               class="btn btn-primary btn-sm">Alterar</a>
                            <a href="{{route('categorias')}}/delete/{{$cat->id}}"
                               class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{route('categorias')}}/create/"
                               class="btn btn-primary btn-sm">Nova Categoria</a>
    </div>
</div>
@endsection
