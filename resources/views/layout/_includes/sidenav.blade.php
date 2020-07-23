<nav>

  <div class="nav-wrapper nav-wrapper-color">


      <a href="{{ route('site.index') }}" class="brand-logo"> <img src="img/fotos-logo/logo-white.png" alt="logo"> </a>


      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">
        <img class="circle btn-sidenav" src="{{$user->foto_perfil}}">
      </a>


      <ul class="right hide-on-med-and-down">



        @if($user->nivel_acesso == 'admin' && Request::is('admin'))
        <!-- Dropdown Structure -->
      {{Auth::user()->name}}

        @endif





      </ul>
    </div>
  </div>
 </nav>

  <ul id="slide-out" class="sidenav">


    <li class="@yield('home-active')"><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>


    @if($user->nivel_acesso == 'professor' && Request::is('professor'))
    <li><a href="#modal-criar" class="modal-trigger"><i class="material-icons">add</i>Criar uma turma</a></li>
    @endif
    <li><div class="divider"></div></li>
    <li class="@yield('config-active')"><a href="#!"><i class="material-icons">settings</i>Configuração</a></li>
    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>
