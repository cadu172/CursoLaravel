@extends('layouts.principal')
@section('titulo','opcoes.blade.php')
@section('conteudo')

<div>
    <ul>
        <li><a class="warning" href="{{route('opcoes',1)}}">Warning</a></li>
        <li><a class="success" href="{{route('opcoes',2)}}">Success</a></li>
        <li><a class="info" href="{{route('opcoes',3)}}">Info</a></li>
        <li><a class="error" href="{{route('opcoes',4)}}">Error</a></li>
    </ul>
</div>

@if (isset($opcao))
    @switch($opcao)
        @case(1)
            <x-Alerta
                tipo="warning"
                titulo="Mensagem de Warning"
                mensagem="Aqui vai uma mensagem de warning" />
            @break
        @case(2)
            <x-Alerta
                tipo="success"
                titulo="Mensagem de success"
                mensagem="Aqui vai uma mensagem de success" />
            @break
        @case(3)
            <x-Alerta
                tipo="info"
                titulo="Mensagem de info"
                mensagem="Aqui vai uma mensagem de info" />
            @break
        @case(4)
            <x-Alerta
                tipo="error"
                titulo="Mensagem de error"
                mensagem="Aqui vai uma mensagem de error" />
            @break
    @endswitch
@endif


@endsection('conteudo')
