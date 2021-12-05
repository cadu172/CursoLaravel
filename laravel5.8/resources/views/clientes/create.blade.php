@extends('layouts.principal')
@section('titulo','create.blade.php')    
@section('conteudo')
    <h2>Inclusão de Novo Cliente</h2>
    <form action="{{route('clientes.store')}}" method="POST">
        <p>
            <label id="lblNome" for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="" style="width: 150px;" />
        </p>
        <p>
            <input type="submit"
                name="BtnGravar"
                id="BtnGravar"
                value="Gravar" />
        </p>
        @csrf
    </form>
@endsection('conteudo')