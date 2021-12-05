<select class="custom-select" name="{{$name}}" id="{{$id}}">    
  @if(isset($dadosMenu))
    @foreach($dadosMenu as $c)
      <option value="{{$c->id}}" {{$c->id==$valorPadrao?'selected':''}} >{{$c->nome}}</option>
    @endforeach
  @endif  
</select>