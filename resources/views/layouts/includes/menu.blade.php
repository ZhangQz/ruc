<nav class="navbar navbar-static-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <span class="navbar-brand"><strong>Exemplo Prático</strong></span>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ route('index') }}">Início</a></li>
      <li><a href="{{ route('veiculo.index') }}">Veículos</a></li>
      <li><a href="{{ route('marca.index') }}">Marcas</a></li> <!-- por implementar -->
      <li><a href="{{ route('modelo.index') }}">Modelos</a></li> <!-- por implementar -->
      <li><a href="{{ route('creditos') }}">Créditos</a></li>
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
              </form>
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
</nav>