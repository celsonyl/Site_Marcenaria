<nav>

  <div class="nav-wrapper nav-wrapper-color">


      <a href="{{ route('site.index') }}" class="brand-logo"> <img src="img/fotos-logo/logo-white.png" alt="logo"> </a>


      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">
        <img class="circle btn-sidenav" src="{{$user->foto_perfil}}">
      </a>


      <ul class="right hide-on-med-and-down">

        @if($user->nivel_acesso == 'aluno' && Request::is('aluno'))
          <li>
            <a href="#modal-entrar" data-position="bottom" data-tooltip="Entrar em uma turma"
            class="tooltipped modal-trigger btn-floating waves-effect waves-light z-depth-0 transparent btn-hover-color">
              <i class="material-icons">add</i>
            </a>
          </li>
        @endif

        @if($user->nivel_acesso == 'admin' && Request::is('admin'))
        <!-- Dropdown Structure -->
        <ul id="dropdown-criar" class="dropdown-content">
          <li><a href="#modal-criar-professor" class="modal-trigger" style="color:black;">Criar professor</a></li>
          <li><a href="#modal-criar-aluno" class="modal-trigger" style="color:black;">Criar aluno</a></li>
        </ul>

        <li><a class="dropdown-trigger" href="" data-target="dropdown-criar">Criar usuário<i class="material-icons right">arrow_drop_down</i></a></li>
        @endif



        @if($user->nivel_acesso == 'professor' && Request::is('professor'))
          <li>
            <a href="#modal-criar" data-position="bottom" data-tooltip="Criar uma turma"
            class="tooltipped modal-trigger btn-floating waves-effect waves-light z-depth-0 transparent btn-hover-color">
              <i class="material-icons">add</i>
            </a>
          </li>
        @endif

      </ul>
    </div>
  </div>
 </nav>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background"></div>
        <a href="{{ route('perfil.index') }}"><img class="circle" src="{{asset($user->foto_perfil)}}"></a>
        <a href="{{ route('perfil.index') }}"><span class="white-text name">@yield('perfil')</span></a>
        <a href="{{ route('perfil.index') }}"><span class="white-text email">@yield('email')</span></a>
      </div>
    </li>

    <li class="@yield('home-active')"><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>
    <li class="@yield('perfil-active')"><a href="{{ route('perfil.index') }}"><i class="material-icons">person</i>Perfil</a></li>
    @if($user->nivel_acesso == 'aluno')
    <li class="@yield('cursos-active')"><a href="#!"><i class="material-icons">menu_book</i>Cursos</a></li>
    <li class="@yield('agenda-active')"><a href="#!"><i class="material-icons">calendar_today</i>Agenda</a></li>
    @endif
    @if($user->nivel_acesso == 'aluno' && Request::is('aluno'))
    <li><a href="#modal-entrar" class="modal-trigger"><i class="material-icons">add</i>Entrar em uma turma</a></li>
    @endif
    @if($user->nivel_acesso == 'admin' && Request::is('admin'))
    <!-- Dropdown Structure -->
    <ul id="dropdown-criar-mobile" class="dropdown-content">
      <li><a href="#modal-criar-professor" class="modal-trigger">Criar professor</a></li>
      <li><a href="#modal-criar-aluno" class="modal-trigger">Criar aluno</a></li>
    </ul>

    <li><div class="divider"></div></li>
    <li><a style="padding-top:5px;" class="dropdown-trigger" href="" data-target="dropdown-criar-mobile"><i class="material-icons">add</i>Criar usuário<i class="material-icons right">arrow_drop_down</i></a></li>
    @endif
    @if($user->nivel_acesso == 'professor' && Request::is('professor'))
    <li><a href="#modal-criar" class="modal-trigger"><i class="material-icons">add</i>Criar uma turma</a></li>
    @endif
    <li><div class="divider"></div></li>
    <li class="@yield('config-active')"><a href="#!"><i class="material-icons">settings</i>Configuração</a></li>
    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>
