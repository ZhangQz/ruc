<nav class="navbar navbar-static-top navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="{{ route('index') }}"><img src="/imagens/RUC_LOGO 01.png" alt="logotipo da Rádio Universidade de Coimbra"></a>
    </div>
    <ul class="nav navbar-nav">
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Programação <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('programa_locutor.index') }}">Programa e Locutores</a></li>
          <li><a href="{{ route('programa.index') }}">Programa</a></li>
          <li><a href="{{ route('locutor.index') }}">Locutor</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informação <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('categoria.index') }}">Categorias de Notícia</a></li>
          <li><a href="{{ route('autor.index') }}">Autor</a></li>
          <li><a href="{{ route('noticia.index') }}">Noticias</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>x
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
</nav>


