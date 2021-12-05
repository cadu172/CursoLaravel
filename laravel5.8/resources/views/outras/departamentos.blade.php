@extends('layouts.principal')
@section('titulo','departamento.blade.php')    
@section('conteudo')    
    <h3>Departamentos</h3>
    <ul>
        <li>Financeiro</li>
        <li>Recursos Humanos</li>
        <li>Tecnologia da Informação</li>
        <li>MIS</li>
        <li>Control-Desk</li>
        <li>Cobrança</li>
        <li>Administrativo</li>
    </ul>
    <x-Alerta 
        tipo="info"
        titulo="Titulo da minha Caixa de mensagem"
        mensagem="Deu erro aqui neste trecho de código" />
    
    <x-Alerta tipo="warning" titulo="Titulo da minha Caixa de mensagem" mensagem="Deu erro aqui neste trecho de código" />
    <x-Alerta tipo="success" titulo="Titulo da minha Caixa de mensagem" mensagem="Deu erro aqui neste trecho de código" />
    <x-Alerta tipo="error" titulo="Titulo da minha Caixa de mensagem" mensagem="Deu erro aqui neste trecho de código" />
    <x-Alerta tipo="success" titulo="Aqui vai o titulo" mensagem="Aqui vai a descricao do erro" />

@endsection('conteudo')