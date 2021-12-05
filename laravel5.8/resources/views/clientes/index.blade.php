@extends('layouts.principal')
@section('titulo','index.blade.php')    
@section('conteudo')

    
<h2>{{$titulo}}</h2>

@if ( (isset($clientes)) && (count($clientes)>0) )
    <ul>
    @foreach ($clientes as $item)
        <li>
            {{ $item['id'] }}&nbsp;-&nbsp;{{ $item['nome'] }}
            &nbsp;|&nbsp;
            <a href="{{route('clientes.edit',$item['id'])}}">Editar</a>
            &nbsp;|&nbsp;
            <a href="{{route('clientes.show',$item['id'])}}">Informações</a>
            <form action="{{route("clientes.destroy",$item["id"])}}}" method="POST">
                @csrf
                @method("delete")
                <button type="submit"
                    name="BtnExcluir">Excluir</button>

            </form>
        </li>
    @endforeach    
    </ul>

    <h3>For Simples</h3>
    @for ($i = 0; $i < 10; $i++)        
        {{$i}},
    @endfor


    <h3>For para impressão do array</h3>
    @for ($i = 0; $i < count($clientes); $i++)
        <p>{{$clientes[$i]["nome"]}}</p>
    @endfor

    <h3>Foreach para leitura do array</h3>
    @foreach ($clientes as $item)        
        @if ($loop->first)       
            <p>{{$loop->index}} => <strong>Primeiro: {{$item["nome"]}}</strong></p>      
        @else
            @if ($loop->last)                    
                <p>{{$loop->index}} => <strong>Último: {{$item["nome"]}}</strong></p>      
            @else
                <p>{{$loop->index}} => {{$item["nome"]}}</p>      
            @endif
        @endif        
    @endforeach        
    
   
@else
    
    <h2>Não Existem Clientes Cadastrados</h2>

@endif

<hr />
<a href="{{route('clientes.create')}}">NOVO CLIENTE</a><br />
@endsection