<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <a class="navbar-brand" href="#">Curso de Laravel - UDEMY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{$current_navbar=='home'?'active':''}}">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item {{$current_navbar=='categoria'?'active':''}}">
        <a class="nav-link" href="{{route('categorias')}}">Categorias</a>
      </li>
      <li class="nav-item {{$current_navbar=='produto'?'active':''}}">
        <a class="nav-link" href="{{route('produtos')}}">Produtos</a>
      </li>
    </ul>
  </div>
</nav>