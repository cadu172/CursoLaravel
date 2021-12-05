@extends('layouts.principal')
@section('titulo','edit.blade.php')    
@section('conteudo')
    <h3>Edição de Informações</h3>
    <form action="{{route("clientes.update",$cliente["id"])}}" method="POST">
        @csrf
        @method("PUT")
        <p>
            Nome:
            <input type="text"
                name="nome"
                value="{{$cliente["nome"]}}"
                style="width: 150px;"
                />
            <button type="submit"
                name="BtnGravar">Gravar Dados</button>
                
        </p>
    </form>
    <p><a href="{{route("clientes.index")}}">Voltar</a></p>
@endsection('conteudo')