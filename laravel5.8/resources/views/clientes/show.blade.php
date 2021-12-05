@extends('layouts.principal')
@section('titulo','show.blade.php')    
@section('conteudo')
    <h3>Informações sobre o Cliente</h3>
    <p>ID: {{$cliente['id']}}</p>
    <p>Nome: {{$cliente['nome']}}</p>
    <p><a href="{{route("clientes.index")}}">Voltar</a></p>
@endsection