<nav>

  <div class="nav-wrapper nav-wrapper-color">


      <a href="{{ route('site.index') }}" class="brand-logo"> <img src="img/fotos-logo/logo-white.png" alt="logo"> </a>

      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">
        Perfil
      </a>


      <ul class="right hide-on-med-and-down">
      {{Auth::user()->name}}
      </ul>
    </div>
  </div>
 </nav>

  <ul id="slide-out" class="sidenav">

    <li class="@yield('home-active')"><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>
    <li><div class="divider"></div></li>
    @if(Auth::user()->nivel_acesso == 'admin')
    <li class="@yield('config-active')"><a href="{{ route('admin.index')}}"><i class="material-icons">settings</i>Tela Admin</a></li>
    <li class="@yield('config-active')"><a href="{{ route('admin.produto.index')}}"><i class="material-icons">settings</i>Configurar Produto</a></li>
    @endif


    @if(Auth::user()->nivel_acesso == 'cliente')
    <li class="@yield('config-active')"><a href="{{ route('carrinho.index')}}"><i class="material-icons">shopping_cart</i>Carrinho</a></li>
    @endif

    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>
