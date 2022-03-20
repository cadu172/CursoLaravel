@auth
<h4>Usuário Logado no momento</h4>
<h4>{{Auth::user()->name}}</h4>
@endauth

@guest
<h4>Usuário não está logado</h4>
@endguest