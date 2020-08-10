


<nav>
  <div class="nav-wrapper nav-wrapper-color">
    <a href="{{ route('site.index') }}" class="brand-logo">LOGO</a>
    <a href="#" data-target="mobile" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li class="@yield('login-active') right"><a href="{{ route('site.login') }}">@yield('login')</a></li>
      <li class="@yield('login-active') right"><a href="{{ route('site.cadastro') }}">@yield('cadastro')</a></li>
      <li><a href="{{ route('login.sair') }}">@yield('sair')</a></li>
    </ul>
  </div>
</nav>

<ul class="sidenav" id="mobile">
  <li class="@yield('login-active')"><a href="{{ route('site.login') }}">@yield('login')</a></li>
</ul>
